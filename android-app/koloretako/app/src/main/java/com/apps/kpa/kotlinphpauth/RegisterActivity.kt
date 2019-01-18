package com.apps.kpa.koloretako

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import com.apps.kpa.koloretako.Common.Common
import com.apps.kpa.koloretako.Model.APIResponse
import com.apps.kpa.koloretako.Model.RegisterResponse
import com.apps.kpa.koloretako.Remote.IMyAPI
import kotlinx.android.synthetic.main.activity_register.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class RegisterActivity : AppCompatActivity() {

    internal lateinit var mService: IMyAPI

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)

        // Init service
        mService = Common.api

        txt_login.setOnClickListener { finish() }

        btn_register.setOnClickListener {

            createNewUser(name.text.toString(),email.text.toString(),password.text.toString(), c_password.text.toString()) }

    }

    private fun createNewUser(name: String, email: String, password: String, c_password: String) {

        mService.registerUser(name,email,password,c_password)
            .enqueue(object: Callback<RegisterResponse>{
                override fun onFailure(call: Call<RegisterResponse>, t: Throwable) {
                    Toast.makeText(this@RegisterActivity,t.message, Toast.LENGTH_SHORT).show()
                }

                override fun onResponse(call: Call<RegisterResponse>, response: Response<RegisterResponse>) {
                    if(response.body()!!.error != null) {
                        Toast.makeText(this@RegisterActivity,"Error : "+response.body()!!.error,Toast.LENGTH_SHORT).show()

                    } else {
                        Toast.makeText(this@RegisterActivity,"Register Success: "+response.body()!!.success!!.name,Toast.LENGTH_SHORT).show()
                        finish()

                    }
                }
            })

    }
}
