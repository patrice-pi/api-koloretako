package com.apps.kpa.koloretako

import android.app.PendingIntent
import android.content.Intent
import android.nfc.NdefMessage
import android.nfc.NdefRecord
import android.nfc.NfcAdapter
import android.os.Build
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.support.v7.widget.LinearLayoutManager
import android.text.Html
import android.text.Html.fromHtml
import android.text.Spanned
import android.widget.Toast
import com.apps.kpa.koloretako.Common.Common
import com.apps.kpa.koloretako.Lib.SshConnec
import com.apps.kpa.koloretako.Model.APIResponse
import com.apps.kpa.koloretako.Model.AddressResponse
import com.apps.kpa.koloretako.Model.LeaderboardResponse
import com.apps.kpa.koloretako.Remote.IMyAPI
import com.apps.kpa.koloretako.SqLite.DatabaseHelper
import kotlinx.android.synthetic.main.activity_home.*
import kotlinx.android.synthetic.main.activity_nfc.*
import kotlinx.android.synthetic.main.activity_register.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class NfcActivity : AppCompatActivity() {
    // NFC adapter for checking NFC state in the device
    private var nfcAdapter: NfcAdapter? = null

    // Pending intent for NFC intent foreground dispatch.
    // Used to read all NDEF tags while the app is running in the foreground.
    private var nfcPendingIntent: PendingIntent? = null
    // Optional: filter NDEF tags this app receives through the pending intent.
    //private var nfcIntentFilters: Array<IntentFilter>? = null

    private val KEY_LOG_TEXT = "logText"

    internal lateinit var mService: IMyAPI
    internal lateinit var sshConnec: SshConnec
    //internal lateinit var databaseHelper: DatabaseHelper

    protected var ipDevice = ""
    //protected var userDevice = ""


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_nfc)

        // Restore saved text if available
        //if (savedInstanceState != null) {
        //    tv_messages.text = savedInstanceState.getCharSequence(KEY_LOG_TEXT)
        //}

        sshConnec = SshConnec()
        //databaseHelper = DatabaseHelper(this@NfcActivity)
        // Check if NFC is supported and enabled
        nfcAdapter = NfcAdapter.getDefaultAdapter(this)
        logMessage("NFC supported", (nfcAdapter != null).toString())
        logMessage("NFC enabled", (nfcAdapter?.isEnabled).toString())

        tv_nfc_supported.text = (nfcAdapter != null).toString()
        tv_nfc_enable.text = (nfcAdapter?.isEnabled).toString()

        if ((nfcAdapter != null).toString() == "true" && (nfcAdapter?.isEnabled).toString() == "true") {
            tv_status.text = "Ok scan device for begin !"
        } else {
            tv_status.text = "Some thing wrong..."
        }

        // Read all tags when app is running and in the foreground
        // Create a generic PendingIntent that will be deliver to this activity. The NFC stack
        // will fill in the intent with the details of the discovered tag before delivering to
        // this activity.
        nfcPendingIntent = PendingIntent.getActivity(
            this, 0,
            Intent(this, javaClass).addFlags(Intent.FLAG_ACTIVITY_SINGLE_TOP), 0
        )

        if (intent != null) {
            // Check if the app was started via an NDEF intent
            //logMessage("Found intent in onCreate", intent.action.toString())
            processIntent(intent)
        }
    }

    override fun onResume() {
        super.onResume()
        // Get all NDEF discovered intents
        // Makes sure the app gets all discovered NDEF messages as long as it's in the foreground.
        nfcAdapter?.enableForegroundDispatch(this, nfcPendingIntent, null, null);
        // Alternative: only get specific HTTP NDEF intent
        //nfcAdapter?.enableForegroundDispatch(this, nfcPendingIntent, nfcIntentFilters, null);
    }

    override fun onPause() {
        super.onPause()
        // Disable foreground dispatch, as this activity is no longer in the foreground
        nfcAdapter?.disableForegroundDispatch(this);
    }

    override fun onNewIntent(intent: Intent?) {
        super.onNewIntent(intent)
        logMessage("Found intent in onNewIntent", intent?.action.toString())
        // If we got an intent while the app is running, also check if it's a new NDEF message
        // that was discovered
        //if (intent != null) processIntent(intent)
        if (NfcAdapter.ACTION_NDEF_DISCOVERED == intent?.action) {
            intent.getParcelableArrayExtra(NfcAdapter.EXTRA_NDEF_MESSAGES)?.also { rawMessages ->
                val messages: List<NdefMessage> = rawMessages.map { it as NdefMessage }
                // Process the messages array.
                //processNdefMessages(messages)
                logMessage("- Id", getIdm(intent))

                mService = Common.api

                getIpAdress(getIdm(intent))

            }
        }

    }
    private fun getIpAdress(id: String) {

        //userDevice = databaseHelper.getAllUser()[0].name
        //println(userDevice)

        mService.getAdress()
            .enqueue(object : Callback<List<AddressResponse>> {
                override fun onFailure(call: Call<List<AddressResponse>>, t: Throwable) {
                    println("message")
                    println(t!!.message)
                    Toast.makeText(this@NfcActivity, t!!.message, Toast.LENGTH_SHORT).show()
                }

                override fun onResponse(call: Call<List<AddressResponse>>, response: Response<List<AddressResponse>>) {

                    val addressList = response.body()!!

                    //val listItems = arrayOfNulls<String>(addressList.size)

                    for (i in 0 until addressList.size) {
                        if (id == addressList[i].machine) {
                            ipDevice = addressList[i].ip_address!!

                            //SshConnec().executeRemoteCommand(address, userName)

                            Toast.makeText(this@NfcActivity, "ID : "+id+" / IP : "+ipDevice, Toast.LENGTH_LONG).show()

                            startActivity(Intent(this@NfcActivity, StartGameActivity::class.java))

                            break
                        }

                    }

                }
            })
    }

    /**
     * Check if the Intent has the action "ACTION_NDEF_DISCOVERED". If yes, handle it
     * accordingly and parse the NDEF messages.
     * @param checkIntent the intent to parse and handle if it's the right type
     */
    private fun processIntent(checkIntent: Intent) {
        // Check if intent has the action of a discovered NFC tag
        // with NDEF formatted contents
        if (checkIntent.action == NfcAdapter.ACTION_NDEF_DISCOVERED) {
            logMessage("New NDEF intent", checkIntent.toString())

            // Retrieve the raw NDEF message from the tag
            val rawMessages = checkIntent.getParcelableArrayExtra(NfcAdapter.EXTRA_NDEF_MESSAGES)
            logMessage("Raw messages", rawMessages.size.toString())

            // Complete variant: parse NDEF messages
            if (rawMessages != null) {
                val messages = arrayOfNulls<NdefMessage?>(rawMessages.size)// Array<NdefMessage>(rawMessages.size, {})
                for (i in rawMessages.indices) {
                    messages[i] = rawMessages[i] as NdefMessage;
                }
                println("ici")
                // Process the messages array.
                //processNdefMessages(messages)
            }

        }
    }

    /**
     * Parse the NDEF message contents and print these to the on-screen log.
     */
    //private fun processNdefMessages(ndefMessages: Array<NdefMessage?>) {
    private fun processNdefMessages(ndefMessages: List<NdefMessage?>) {

        // Go through all NDEF messages found on the NFC tag
        for (curMsg in ndefMessages) {
            if (curMsg != null) {
                // Print generic information about the NDEF message
                logMessage("Message", curMsg.toString())
                // The NDEF message usually contains 1+ records - print the number of recoreds
                logMessage("Records", curMsg.records.size.toString())

                // Loop through all the records contained in the message
                for (curRecord in curMsg.records) {
                    if (curRecord.toUri() != null) {
                        // URI NDEF Tag
                        logMessage("- URI", curRecord.toUri().toString())
                    } else {
                        // Other NDEF Tags - simply print the payload
                        logMessage("- Contents", curRecord.payload.contentToString())
                    }
                    if (curRecord.payload != null) {
                        // URI NDEF Tag
                        logMessage("- Contents", curRecord.payload.contentToString())

                    }
                }

            }
        }
    }

    private fun getIdm(intent: Intent): String {
        var idm: String = ""
        val idmByte = StringBuffer()
        val rawIdm = intent.getByteArrayExtra(NfcAdapter.EXTRA_ID)
        if (rawIdm != null) {
            //for (i in 0..rawIdm.size - 1) {
            //    idmByte.append(Integer.toHexString(rawIdm[i].toInt()))
            //}
            //idm = idmByte.toString()

            for (b in rawIdm) {
                val idTag = String.format("%02X", b)
                idm += idTag
            }

        }
        println(idm)
        return idm
    }

    fun ByteArray.toHexString() = joinToString("") { String.format("%02x", it) }

    // --------------------------------------------------------------------------------
    // Utility functions

    /**
     * Save contents of the text view to the state. Ensures the text view contents survive
     * screen rotation.
     */
    override fun onSaveInstanceState(outState: Bundle?) {
        //outState?.putCharSequence(KEY_LOG_TEXT, tv_messages.text)
        super.onSaveInstanceState(outState)
    }

    /**
     * Log a message to the debug text view.
     * @param header title text of the message, printed in bold
     * @param text optional parameter containing details about the message. Printed in plain text.
     */
    private fun logMessage(header: String, text: String?) {
        //tv_messages.append(if (text.isNullOrBlank()) fromHtml("<b>$header</b><br>") else fromHtml("<b>$header</b>: $text<br>"))
        scrollDown()
    }

    /**
     * Convert HTML formatted strings to spanned (styled) text, for inserting to the TextView.
     * Externalized into an own function as the fromHtml(html) method was deprecated with
     * Android N. This method chooses the right variant depending on the OS.
     * @param html HTML-formatted string to convert to a Spanned text.
     */
    private fun fromHtml(html: String): Spanned {
        return if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.N) {
            fromHtml(html, Html.FROM_HTML_MODE_LEGACY)
        } else {
            @Suppress("DEPRECATION")
            Html.fromHtml(html)
        }
    }

    /**
     * Scroll the ScrollView to the bottom, so that the latest appended messages are visible.
     */
    private fun scrollDown() {
        sv_messages.post({ sv_messages.smoothScrollTo(0, sv_messages.bottom) })
    }
}
