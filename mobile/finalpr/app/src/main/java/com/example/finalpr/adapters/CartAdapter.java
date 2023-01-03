package com.example.finalpr.adapters;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.example.finalpr.R;
import com.example.finalpr.models.CartData;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class CartAdapter extends RecyclerView.Adapter<CartAdapter.VHolder> {
    private Context context;
    private List<CartData> dataList;
    private VHolder holder;
    private int position;
    private ImageView coverImage;
    private TextView title;
    private TextView price;

    public CartAdapter(Context context, List<CartData> dataList) {
        this.context = context;
        this.dataList = dataList;
    }
    public void setCartList(List<CartData> dataList) {
        this.dataList = dataList;
        notifyDataSetChanged();
    }

    @NonNull
    @Override
    public VHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.rowitem3,parent,false);
        return new VHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull VHolder holder, int position) {
        CartData result = dataList.get(position);
        String idcrt = String.valueOf(result.getId_pembelian());
        String qty = String.valueOf(result.getJumlah());
        String titlee = result.getBarang();
        String hargaa = String.valueOf(result.getHarga());
        String gambar = "https://markas-phone.000webhostapp.com/markas/assets/product/"+result.getGambar();
        holder.count = Integer.parseInt(qty);
        holder.price.setText("Rp "+hargaa);
        holder.title.setText(titlee);
        holder.jumlah.setText(qty);
        Glide.with(context)
                .load(gambar)
                .apply(RequestOptions.centerCropTransform())
                .into(holder.coverImage);

        holder.tambah.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                holder.count ++;
                holder.jumlah.setText(""+holder.count);
                String qtyy= String.valueOf(holder.count);
                updatecart(idcrt,hargaa, qtyy);
            }
        });

        holder.kurang.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (holder.count<0){
                    holder.count = 0;
                    holder.jumlah.setText(holder.count);
                    String qtyy= String.valueOf(holder.count);
                    deletecart(idcrt);
                }else if (holder.count==0){
                    deletecart(idcrt);
                }else if (holder.count==1){
                    holder.count--;
                    holder.jumlah.setText(""+holder.count);
                    deletecart(idcrt);
                } else {
                    holder.count--;
                    holder.jumlah.setText(""+holder.count);
                    String qtyy= String.valueOf(holder.count);
                    updatecart(idcrt,hargaa, qtyy);
                }
            }
        });
        holder.deletee.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                deletecart(idcrt);
            }
        });
    }

    @Override
    public int getItemCount() {
        if(this.dataList != null) {
            return this.dataList.size();
        }
        return 0;
    }

    public class VHolder extends RecyclerView.ViewHolder {
        public final View mView;

        private ImageView coverImage,deletee;
        private TextView title;
        private TextView price;

        ImageView kurang,tambah;
        TextView jumlah;

        private Integer count;
        public VHolder(View view) {
            super(view);
            mView = itemView;

            coverImage = mView.findViewById(R.id.eachCartItemIV);
            title = mView.findViewById(R.id.eachCartItemName);
            price = mView.findViewById(R.id.eachCartItemPriceTv);
            deletee = mView.findViewById(R.id.eachCartItemDeleteBtn);

            kurang = mView.findViewById(R.id.eachCartItemMinusQuantityBtn);
            tambah = mView.findViewById(R.id.eachCartItemAddQuantityBtn);
            jumlah= mView.findViewById(R.id.eachCartItemQuantityTV);

        }
    }
    public void deletecart(String idcrt){
        RequestQueue queue = Volley.newRequestQueue(context.getApplicationContext());
        String url ="https://markas-phone.000webhostapp.com/markas/deletecart.php";
        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String status = jsonObject.getString("status");
                            String message = jsonObject.getString("message");
                            if (status.equals("success")){
                                Toast.makeText(context.getApplicationContext(),message, Toast.LENGTH_LONG).show();

                            } else {
                                Toast.makeText(context.getApplicationContext(), message, Toast.LENGTH_LONG).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(context.getApplicationContext(), error.getLocalizedMessage(), Toast.LENGTH_LONG).show();
            }
        }){
            protected Map<String, String> getParams(){
                Map<String, String> paramV = new HashMap<>();
                paramV.put("id_pembelian", idcrt);
                return paramV;
            }
        };
        queue.add(stringRequest);
    }
    public void updatecart(String idcrt,String hargaa, String qtyy) {
        RequestQueue queue = Volley.newRequestQueue(context.getApplicationContext());
        String url = "https://markas-phone.000webhostapp.com/markas/updateqtycart.php";
        String quantity = qtyy;
        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String status = jsonObject.getString("status");
                            String message = jsonObject.getString("message");
                            if (status.equals("success")) {
                                Toast.makeText(context.getApplicationContext(), "Berhasil menambahkan ke keranjang", Toast.LENGTH_LONG).show();

                            } else {
                                Toast.makeText(context.getApplicationContext(), message, Toast.LENGTH_LONG).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(context.getApplicationContext(), error.getLocalizedMessage(), Toast.LENGTH_LONG).show();
            }
        }) {
            protected Map<String, String> getParams() {
                Map<String, String> paramV = new HashMap<>();
                paramV.put("id_pembelian", idcrt);
                paramV.put("harga", hargaa);
                paramV.put("jumlah", quantity);
                return paramV;
            }
        };
        queue.add(stringRequest);
    }
}