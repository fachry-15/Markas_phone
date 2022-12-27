package com.example.finalpr.adapters;

import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.finalpr.Model;
import com.example.finalpr.ProductActivity;
import com.example.finalpr.R;

import java.util.List;

public class ItemAdapter extends RecyclerView.Adapter<ItemAdapter.ViewHolder> {

    List<Model> itemList1;

    public ItemAdapter(List<Model> itemList) {
        this.itemList1 = itemList;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.rowitem,parent,false);
        ViewHolder viewHolder = new ViewHolder(view);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(@NonNull ItemAdapter.ViewHolder holder, int position) {
        holder.itemImage.setImageResource(itemList1.get(position).getImage());
        holder.itemtxt.setText(itemList1.get(position).getName());
        holder.itemImage.setOnClickListener(v -> {
            Intent intent = new Intent(v.getContext(), ProductActivity.class);
            v.getContext().startActivity(intent);
        });



    }

    @Override
    public int getItemCount() {
        return itemList1.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        ImageView itemImage;
        TextView itemtxt;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);

            itemImage = itemView.findViewById(R.id.itemImg);
            itemtxt = itemView.findViewById(R.id.itemName);

        }
    }
}
