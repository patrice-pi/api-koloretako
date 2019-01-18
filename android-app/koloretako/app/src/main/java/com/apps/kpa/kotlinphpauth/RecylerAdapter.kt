package com.apps.kpa.koloretako

import android.content.Context
import android.support.v7.widget.RecyclerView
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import com.apps.kpa.koloretako.R
import com.apps.kpa.koloretako.Model.LeaderboardResponse

class RecyclerAdapter(private val context: Context,
                      private val leaderboardList: List<LeaderboardResponse>) : RecyclerView.Adapter<RecyclerAdapter.ViewHolder>() {


    private val images = arrayOf(
        R.drawable.trophy_or, R.drawable.trophy_argent,
        R.drawable.trophy_bronze, R.drawable.loose)

    inner class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {

        var itemImage: ImageView
        var itemName: TextView
        var itemScore: TextView
        var itemDuration: TextView


        init {
            itemImage = itemView.findViewById(R.id.item_image)
            itemName = itemView.findViewById(R.id.item_name)
            itemScore = itemView.findViewById(R.id.item_score)
            itemDuration = itemView.findViewById(R.id.item_duration)
        }
    }

    override fun onCreateViewHolder(viewGroup: ViewGroup, i: Int): ViewHolder {
        val v = LayoutInflater.from(viewGroup.context)
            .inflate(R.layout.card_layout, viewGroup, false)
        return ViewHolder(v)
    }

    override fun onBindViewHolder(viewHolder: ViewHolder, i: Int) {
        viewHolder.itemName.text = leaderboardList[i].pseudo
        viewHolder.itemScore.text = leaderboardList[i].score.toString()
        viewHolder.itemDuration.text = leaderboardList[i].duration.toString()
        if (i<3) {
            viewHolder.itemImage.setImageResource(images[i])
        } else {
            viewHolder.itemImage.setImageResource(images[3])
        }
    }

    override fun getItemCount(): Int {
        return leaderboardList.size
    }


}