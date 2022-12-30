package com.example.finalpr.adapters;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.finalpr.ProductDetails;
import com.example.finalpr.ProductResult;
import com.example.finalpr.R;

import java.util.List;

public class ItemAdapter1 extends RecyclerView.Adapter<ItemAdapter1.ViewHolder> {
    Integer a;
    Context mContext;
    List<ProductResult> productResults;

    public ItemAdapter1(Context mContext, List<ProductResult> productResults) {
        this.productResults = productResults;
        this.mContext = mContext;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(mContext).inflate(R.layout.rowitem1, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        final ProductResult temp = productResults.get(position);
        holder.namatxt.setText(productResults.get(position).getNamaHp());
        holder.hargatxt.setText(String.valueOf(productResults.get(position).getHarga()));
        Glide.with(mContext).load(productResults.get(position).getUrlGambar())
                .placeholder(R.drawable.loading).error(R.drawable.ic_launcher_background)
                .into(holder.itemImage);
        holder.itemImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(mContext, ProductDetails.class);
                intent.putExtra("image",temp.getUrlGambar());
                intent.putExtra("title",temp.getNamaHp());
                intent.putExtra("spek",temp.getSpesifikasi());
                intent.putExtra("price",temp.getHarga());
                intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                mContext.startActivity(intent);
            }
        });
    }


    @Override
    public int getItemCount() {
        return productResults.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        ImageView itemImage;
        TextView namatxt, hargatxt, desctxt;
        CardView cardproduct;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);

            itemImage = itemView.findViewById(R.id.prodimage);
            namatxt = itemView.findViewById(R.id.prodname);
            hargatxt = itemView.findViewById(R.id.prodprice);
            cardproduct = itemView.findViewById(R.id.cardproduct);
            desctxt = itemView.findViewById(R.id.prodspek);

        }
    }
}
