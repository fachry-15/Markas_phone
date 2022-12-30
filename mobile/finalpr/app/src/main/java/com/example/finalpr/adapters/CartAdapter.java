package com.example.finalpr.adapters;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

import com.example.finalpr.R;

public class CartAdapter extends RecyclerView.Adapter<CartAdapter.VHolder> {

    @NonNull
    @Override
    public VHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.rowitem3,parent,false);
        return new VHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull VHolder holder, int position) {

    }

    @Override
    public int getItemCount() {
        return 0;
    }

    public class VHolder extends RecyclerView.ViewHolder {

        public VHolder(View view) {
            super(view);

        }
    }
}
