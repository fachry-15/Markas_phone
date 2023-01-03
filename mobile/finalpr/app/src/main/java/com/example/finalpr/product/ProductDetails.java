package com.example.finalpr.product;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.bumptech.glide.Glide;
import com.example.finalpr.MainActivity;
import com.example.finalpr.R;
import com.example.finalpr.adapters.ItemAdapter1;
import com.example.finalpr.fragment.CartFragment;
import com.example.finalpr.logres.LoginActivity;
import com.example.finalpr.models.ProductResult;

import org.json.JSONException;
import org.json.JSONObject;

import java.text.NumberFormat;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ProductDetails extends AppCompatActivity {
    private ImageView imageView;
    private TextView titleprod;
    private TextView hargaprod;
    private ProductResult productResult;

    String id_user, id_barang, nama_hp, harga, url_gambar ;
    ImageView img;
    TextView tv1, tv2, tv3, tv4;
    Button increment, decrement, proceed;
    int count=0;

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_details);


        img=findViewById(R.id.detailimg);
        tv1=findViewById(R.id.detailname);
        tv2=findViewById(R.id.detailprice);
        tv3=findViewById(R.id.detailspek);
        SharedPreferences sharedPreferences = getSharedPreferences("markasphone", Context.MODE_PRIVATE);
        id_user = sharedPreferences.getString("id_user","");

        String tmbhkecart= "Tambah ke Keranjang";
        String kemenu="Kembali ke Menu";


        String image = getIntent().getStringExtra("image");
        Glide.with(this)
                .load(image)
                .into(img);

        tv1.setText(getIntent().getStringExtra("title"));
        tv3.setText(getIntent().getStringExtra("spek"));
        tv2.setText(getIntent().getStringExtra("price"));


        increment = findViewById(R.id.btnincrement);
        decrement = findViewById(R.id.btndecrement);
        proceed = findViewById(R.id.btnproceed);
        tv4 = findViewById(R.id.qtyview);


        increment.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                count ++;
                tv4.setText(""+count);
                proceed.setText(tmbhkecart);
                proceed.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        Intent intent = new Intent(ProductDetails.this, MainActivity.class);
                        intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                        startActivity(intent);

                    }
                });
            }
        });

        decrement.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (count<=0) count=0;
                else
                    count--;
                tv4.setText(""+count);
                proceed.setText(tmbhkecart);
                proceed.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        Intent intent = new Intent(ProductDetails.this, MainActivity.class);
                        intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                        startActivity(intent);
                    }
                });
            }
        });
    }
    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }
    public void addtocart(){
        SharedPreferences sharedPreferences = getSharedPreferences("markasphone", Context.MODE_PRIVATE);
        String id_user2 = String.valueOf(sharedPreferences.getString("id_user",""));
        String id_barang2 = String.valueOf(getIntent().getStringExtra("id_barang"));
        String nama_hp2 = String.valueOf(getIntent().getStringExtra("title"));
        String url_gambar2 = String.valueOf(getIntent().getStringExtra("image"));
        String harga2 = String.valueOf(getIntent().getStringExtra("price"));
        try {
            String price2 = String.valueOf(NumberFormat.getInstance().parse(harga2).intValue());
        } catch (ParseException e) {
            e.printStackTrace();
        }
        String quantity2 = tv4.getText().toString();
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url ="https://markas-phone.000webhostapp.com/markas/addcart.php";

        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String status = jsonObject.getString("status");
                            String message = jsonObject.getString("message");
                            if (status.equals("success")){
                                Toast.makeText(getApplicationContext(),message, Toast.LENGTH_LONG).show();
                                onBackPressed();
                            } else {
                                Toast.makeText(getApplicationContext(),message, Toast.LENGTH_LONG).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(),error.getLocalizedMessage(), Toast.LENGTH_LONG).show();
            }
        }){
            protected Map<String, String> getParams(){
                Map<String, String> paramV = new HashMap<>();
                paramV.put("id_user", id_user2);
                paramV.put("id_product", id_barang2);
                paramV.put("title", nama_hp2);
                paramV.put("image", url_gambar2);
                paramV.put("price", harga2);
                paramV.put("quantity", quantity2);
                return paramV;
            }
        };
        queue.add(stringRequest);
    }
}