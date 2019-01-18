package com.apps.kpa.koloretako.Adapter

import android.content.Context
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.BaseAdapter
import android.widget.ImageView
import android.widget.TextView
import com.apps.kpa.koloretako.Model.LeaderboardResponse
import com.apps.kpa.koloretako.R

//class LeaderboardAdapter(
  //  private val context: Context,
  //  private val dataSource: List<LeaderboardResponse>
//) : BaseAdapter() {

  //  private val inflater: LayoutInflater = context.getSystemService(Context.LAYOUT_INFLATER_SERVICE) as LayoutInflater


    //1
    //override fun getCount(): Int {
      //  return dataSource.size
    //}

    //2
   // override fun getItem(position: Int): Any {
    //    return dataSource[position]
    //}

    //3
    //override fun getItemId(position: Int): Long {
      //  return position.toLong()
   // }

    //4
    //override fun getView(position: Int, convertView: View?, parent: ViewGroup) {
        // Get view for row item
       // val rowView = inflater.inflate(R.layout.row_leaderboard, parent, false)

        // Get title element
       // val titleTextView = rowView.findViewById(R.id.leaderboard_list_name) as TextView

// Get subtitle element
       // val subtitleTextView = rowView.findViewById(R.id.leaderboard_list_score) as TextView

// Get detail element
       // val detailTextView = rowView.findViewById(R.id.leadrboard_list_duration) as TextView

// Get thumbnail element
        //val thumbnailImageView = rowView.findViewById(R.id.recipe_list_thumbnail) as ImageView

        // 1
      //  val leaderboard = getItem(position) as LeaderboardResponse

// 2
        //titleTextView.text = leaderboard.pseudo
        //subtitleTextView.text = leaderboard.score
        //detailTextView.text = leaderboard.

// 3
        //Picasso.with(context).load(recipe.imageUrl).placeholder(R.mipmap.ic_launcher).into(thumbnailImageView)

        //return rowView
    //}
//}