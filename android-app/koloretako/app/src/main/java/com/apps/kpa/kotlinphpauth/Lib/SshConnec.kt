package com.apps.kpa.koloretako.Lib

import android.content.Context
import android.database.sqlite.SQLiteOpenHelper
import android.os.AsyncTask
import com.apps.kpa.koloretako.Model.LeaderboardResponse
import com.apps.kpa.koloretako.SqLite.DatabaseHelper
import com.jcraft.jsch.ChannelExec
import com.jcraft.jsch.JSch
import okhttp3.Address
import java.io.ByteArrayOutputStream
import java.util.*

// class MainActivity : AppCompatActivity() {
//    override fun onCreate(savedInstanceState: Bundle?) {
//        super.onCreate(savedInstanceState)
//        setContentView(R.layout.activity_main)
//        SshTask().execute()
//    }
//class SshConnec(context: Context) {

class SshConnec : AsyncTask<Void, Void, String>() {

    private val username = "pi"
    private val password = "0000"
    private val port = 22

    override fun doInBackground(vararg p0: Void?): String {

        val output = executeRemoteCommand("192.168.1.1")
        print(output)
        return output
    }


    fun executeRemoteCommand(hostname: String): String {
        val jsch = JSch()
        val session = jsch.getSession(username, hostname, port)
        session.setPassword(password)

        println(hostname)
        // Avoid asking for key confirmation.
        val properties = Properties()
        properties.put("StrictHostKeyChecking", "no")
        session.setConfig(properties)

        session.connect()

        // Create SSH Channel.
        val sshChannel = session.openChannel("exec") as ChannelExec
        val outputStream = ByteArrayOutputStream()
        sshChannel.outputStream = outputStream

        // Execute command.

        sshChannel.setCommand("python koloretako.py")

        sshChannel.connect()

        // Sleep needed in order to wait long enough to get result back.
        Thread.sleep(1_000)
        sshChannel.disconnect()

        session.disconnect()

        return outputStream.toString()
    }
}