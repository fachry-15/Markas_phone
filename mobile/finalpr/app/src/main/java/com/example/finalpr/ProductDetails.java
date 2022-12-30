package com.example.finalpr;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.example.finalpr.adapters.ItemAdapter1;

import java.util.ArrayList;
import java.util.List;

public class ProductDetails extends AppCompatActivity {
    ImageView img;
    TextView tv1, tv2, tv3;

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_details);


        img=findViewById(R.id.detailimg);
        tv1=findViewById(R.id.detailname);
        tv2=findViewById(R.id.detailprice);
        tv3=findViewById(R.id.detailspek);

        String image = getIntent().getStringExtra("image");
        Glide.with(this)
                        .load(image)
                                .into(img);

        tv1.setText(getIntent().getStringExtra("title"));
        tv3.setText(getIntent().getStringExtra("spek"));
        tv2.setText(String.valueOf(getIntent().getIntExtra("price",0)));

    }
}