package com.apps.kpa.koloretako

import android.content.Context
import android.os.AsyncTask
import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.widget.Toast
import com.apps.kpa.koloretako.SqLite.DatabaseHelper
import com.jcraft.jsch.ChannelExec
import com.jcraft.jsch.JSch
import kotlinx.android.synthetic.main.activity_start_game.*
import java.io.ByteArrayOutputStream
import java.util.*

class StartGameActivity : AppCompatActivity() {

    internal lateinit var databaseHelper: DatabaseHelper
    var player = ""

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_start_game)

        databaseHelper = DatabaseHelper(this@StartGameActivity)
        player = databaseHelper.getAllUser()[0].name
        println(player)

        btn_launch_ssh.setOnClickListener {
            Toast.makeText(this@StartGameActivity, "Start Game!", Toast.LENGTH_SHORT).show()
            SshTask(player).execute()
            println("start")

        }
    }

    class SshTask(player: String) : AsyncTask<Void, Void, String>() {

        internal lateinit var databaseHelper: DatabaseHelper
        var player = player

        override fun doInBackground(vararg p0: Void?): String {

            println("player")
            println(player)

            val output = executeRemoteCommand(player,"pi", "0000", "192.168.1.25")
            print(output)
            return output
        }
    }
}

fun executeRemoteCommand(
    player: String,
    username: String,
    password: String,
    hostname: String,
    port: Int = 22
): String {
    val jsch = JSch()
    val session = jsch.getSession(username, hostname, port)
    session.setPassword(password)

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
    sshChannel.setCommand("python game.py "+player)
    sshChannel.connect()

    // Sleep needed in order to wait long enough to get result back.
    Thread.sleep(180000)
    
    sshChannel.disconnect()

    session.disconnect()

    return outputStream.toString()
}
