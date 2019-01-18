package com.apps.kpa.koloretako

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import com.apps.kpa.koloretako.Common.Common
import com.apps.kpa.koloretako.Model.DetailUserResponse
import com.apps.kpa.koloretako.Model.RegisterResponse
import com.apps.kpa.koloretako.Remote.IMyAPI
import com.apps.kpa.koloretako.SqLite.DatabaseHelper
import com.apps.kpa.koloretako.SqLite.User
import kotlinx.android.synthetic.main.activity_main.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainActivity : AppCompatActivity() {

    internal lateinit var mService: IMyAPI
    internal lateinit var databaseHelper: DatabaseHelper

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        // Init service
        mService = Common.api
        databaseHelper = DatabaseHelper(this@MainActivity)

        // Event
        txt_register.setOnClickListener { startActivity(Intent(this@MainActivity, RegisterActivity::class.java)) }

        btn_login.setOnClickListener { authenticateUser(email.text.toString(), password.text.toString()) }
        //btn_login.setOnClickListener { startActivity(Intent(this@MainActivity,HomeActivity::class.java)) }

    }

    private fun authenticateUser(email: String, password: String) {

        mService.loginUser(email, password)
            .enqueue(object : Callback<RegisterResponse> {
                override fun onFailure(call: Call<RegisterResponse>, t: Throwable) {
                    Toast.makeText(this@MainActivity, t.message, Toast.LENGTH_SHORT).show()
                }

                override fun onResponse(call: Call<RegisterResponse>, response: Response<RegisterResponse>) {
                    println(response.body()!!.error)
                    if (response.body()!!.error != null) {
                        Toast.makeText(this@MainActivity, "Error : "+response.body()!!.error, Toast.LENGTH_SHORT).show()

                    } else {
                        Toast.makeText(this@MainActivity, "Login Success", Toast.LENGTH_SHORT).show()
                        println(response.body()!!.success!!.token)
                        var token = "Bearer "+response.body()!!.success!!.token
                        mService.detailUser(token)
                            .enqueue(object : Callback<DetailUserResponse> {
                                override fun onFailure(call: Call<DetailUserResponse>, t: Throwable) {
                                    Toast.makeText(this@MainActivity, t.message, Toast.LENGTH_SHORT).show()
                                }

                                override fun onResponse(call: Call<DetailUserResponse>, res: Response<DetailUserResponse>) {
                                    println(res.body()!!.message)

                                    if (res.body()!!.message != null) {
                                        println(res.body()!!.message)
                                        Toast.makeText(this@MainActivity, "Error : "+res.body()!!.message, Toast.LENGTH_LONG).show()

                                    } else {
                                        Toast.makeText(this@MainActivity, "Save profile", Toast.LENGTH_SHORT).show()
                                        postDataToSQLite(res.body()!!.success!!.name!!, res.body()!!.success!!.email!!, password, response.body()!!.success!!.token)
                                        startActivity(Intent(this@MainActivity, HomeActivity::class.java))
                                    }
                                }
                            })
                    }
                }
            })
    }

    /**
     * This method is to validate the input text fields and post data to SQLite
     */
    private fun postDataToSQLite(name: String, email: String, password: String, token: String) {


        var user = User(
            name = name!!.toString().trim(),
            email = email!!.toString().trim(),
            password = password!!.toString().trim(),
            token = token!!.toString().trim()
        )

        databaseHelper!!.addUser(user)


    }

}
