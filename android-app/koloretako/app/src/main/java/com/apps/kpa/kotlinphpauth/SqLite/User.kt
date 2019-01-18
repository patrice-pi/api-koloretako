package com.apps.kpa.koloretako.SqLite

// model class
data class User(
    val id: Int = -1,
    val name: String,
    val email: String,
    val password: String,
    val token: String
)