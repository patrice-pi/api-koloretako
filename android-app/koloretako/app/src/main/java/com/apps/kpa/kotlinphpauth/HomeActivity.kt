package com.apps.kpa.koloretako

import android.content.Intent
import android.os.Bundle
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager
import android.support.v7.widget.RecyclerView
import android.widget.ListView
import android.widget.Toast
import com.apps.kpa.koloretako.Common.Common
import com.apps.kpa.koloretako.Model.LeaderboardResponse
import com.apps.kpa.koloretako.Remote.IMyAPI
import android.view.Menu
import android.view.MenuItem
import com.apps.kpa.koloretako.SqLite.DatabaseHelper
import kotlinx.android.synthetic.main.activity_home.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class HomeActivity : AppCompatActivity() {

    internal lateinit var mService: IMyAPI
    internal lateinit var listView: ListView
    private var layoutManager: RecyclerView.LayoutManager? = null
    private var adapter: RecyclerView.Adapter<RecyclerAdapter.ViewHolder>? = null
    internal lateinit var databaseHelper: DatabaseHelper

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_home)
        setSupportActionBar(toolbar)

        mService = Common.api

        databaseHelper = DatabaseHelper(this@HomeActivity)

        getLeaderboardList()

        fab.setOnClickListener {
            //view ->
            // Snackbar.make(view, "Scan RFID", Snackbar.LENGTH_LONG).setAction("Action", null).show()
            Toast.makeText(this@HomeActivity, "Scan RFID", Toast.LENGTH_SHORT).show()
            startActivity(Intent(this@HomeActivity, NfcActivity::class.java))

        }

        //btn_launch_ssh.setOnClickListener {
        //    Toast.makeText(this@HomeActivity, "Start Game!", Toast.LENGTH_SHORT).show()
        //    var res = SshTask().execute()
        //    println("start")
        //    println(res)
        //}
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.navigation, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean = when (item.itemId) {
        R.id.navigation_logout -> {
            // do stuff
            databaseHelper.deleteAllUser()
            startActivity(Intent(this@HomeActivity, LandingActivity::class.java))
            true
        }
        else -> super.onOptionsItemSelected(item)
    }


    private fun getLeaderboardList() {

        mService.getLeaderboards()
            .enqueue(object : Callback<List<LeaderboardResponse>> {
                override fun onFailure(call: Call<List<LeaderboardResponse>>, t: Throwable) {
                    println("message")
                    println(t!!.message)
                    Toast.makeText(this@HomeActivity, t!!.message, Toast.LENGTH_SHORT).show()
                }

                override fun onResponse(
                    call: Call<List<LeaderboardResponse>>,
                    response: Response<List<LeaderboardResponse>>
                ) {

                    val leaderboardList = response.body()!!

                    //val adapter = LeaderboardAdapter(this@HomeActivity, leaderboardList)
                    //listView.adapter = adapter

                    layoutManager = LinearLayoutManager(this@HomeActivity)
                    recycler_view.layoutManager = layoutManager

                    adapter = RecyclerAdapter(this@HomeActivity, leaderboardList)
                    recycler_view.adapter = adapter


                }
            })


    }
}
