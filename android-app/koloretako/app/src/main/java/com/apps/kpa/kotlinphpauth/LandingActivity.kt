package com.apps.kpa.koloretako

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import com.apps.kpa.koloretako.SqLite.DatabaseHelper

class LandingActivity : AppCompatActivity() {

    internal lateinit var databaseHelper: DatabaseHelper


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_landing)

        databaseHelper = DatabaseHelper(this@LandingActivity)

         var bLogin = databaseHelper!!.checkLogin()
        println("login")

        println (bLogin)
        if (bLogin == true) {
            startActivity(Intent(this@LandingActivity, HomeActivity::class.java))
        } else {
            startActivity(Intent(this@LandingActivity, MainActivity::class.java))
        }

        //Toast.makeText(this@LandingActivity, "Welcome back", Toast.LENGTH_SHORT).show()
        //startActivity(Intent(this@LandingActivity, HomeActivity::class.java))

    }


}
