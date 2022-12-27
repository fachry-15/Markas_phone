package com.example.finalpr;

import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

public class ProductDetails extends AppCompatActivity {
    ImageView img;
    TextView tv1;
    List<Model> itemList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_details);


        img=(ImageView)findViewById(R.id.detailimg);
        tv1=(TextView)findViewById(R.id.detailname);

        img.setImageResource(getIntent().getIntExtra("detailimg",0));
        tv1.setText(getIntent().getStringExtra("detailname"));
    }

    private List<Model> initData() {

        itemList = new ArrayList<>();
        itemList.add(new Model(R.drawable.hp1, "Dummy"));
        itemList.add(new Model(R.drawable.hp2, "Dummy"));
        itemList.add(new Model(R.drawable.hp3, "Dummy"));
        itemList.add(new Model(R.drawable.hp4, "Dummy"));
        itemList.add(new Model(R.drawable.hp5, "Dummy"));
        itemList.add(new Model(R.drawable.hp6, "Dummy"));

        return itemList;
    }
}