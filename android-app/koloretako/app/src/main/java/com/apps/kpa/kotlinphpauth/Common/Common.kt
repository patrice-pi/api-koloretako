package com.apps.kpa.koloretako.Common

import com.apps.kpa.koloretako.Remote.IMyAPI
import com.apps.kpa.koloretako.Remote.RetrofitClient

object Common {
    val BASE_URL="http://192.168.1.56/"

    val api:IMyAPI
    get() = RetrofitClient.getClient(BASE_URL).create(IMyAPI::class.java)
}