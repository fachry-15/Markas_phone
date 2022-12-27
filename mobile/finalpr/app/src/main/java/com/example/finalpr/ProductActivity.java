package com.example.finalpr;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;

import com.example.finalpr.adapters.ItemAdapter;
import com.example.finalpr.adapters.ItemAdapter1;

import java.util.ArrayList;
import java.util.List;

public class ProductActivity extends AppCompatActivity {

    //RecyclerView
    RecyclerView recyclerView;
    List<Model> itemList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product);

        recyclerView = findViewById(R.id.recyclerproduk);
        recyclerView.setHasFixedSize(true);
        GridLayoutManager gridLayoutManager = new GridLayoutManager(getApplicationContext(),2);
        gridLayoutManager.setOrientation(LinearLayoutManager.VERTICAL);
        recyclerView.setLayoutManager(gridLayoutManager);

        recyclerView.setAdapter(new ItemAdapter1(initData()));
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