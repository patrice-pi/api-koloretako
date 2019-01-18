package com.apps.kpa.koloretako.Remote

import com.apps.kpa.koloretako.Model.*
import retrofit2.Call
import retrofit2.http.*
import retrofit2.http.POST
import retrofit2.http.FormUrlEncoded



interface IMyAPI {
    @FormUrlEncoded
    @POST("api/register")
    fun registerUser(@Field("name") name:String, @Field("email") email:String, @Field("password") password:String, @Field("c_password") c_password:String):Call<RegisterResponse>

    @FormUrlEncoded
    @POST("api/login")
    fun loginUser(@Field("email") email:String, @Field("password") password:String):Call<RegisterResponse>

    @Headers("Content-Type: application/json", "Accept: application/json")
    @POST("api/details")
    fun detailUser(@Header("Authorization") token:String):Call<DetailUserResponse>

    //@FormUrlEncoded
    //@POST("api/details")
    //fun detailUser(@Field("grant_type") grantType: String): Call<DetailUserResponse>

    @GET("api/leaderboards/")
    fun getLeaderboards():Call<List<LeaderboardResponse>>

    @GET("api/ip_address")
    fun getAdress():Call<List<AddressResponse>>


}