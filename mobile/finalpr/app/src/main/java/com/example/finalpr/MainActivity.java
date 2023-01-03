package com.example.finalpr;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentTransaction;

import android.os.Bundle;
import android.view.MenuItem;

import com.example.finalpr.fragment.CartFragment;
import com.example.finalpr.fragment.HomeFragment;
import com.example.finalpr.fragment.ProfileFragment;
import com.google.android.material.bottomnavigation.BottomNavigationView;

public class MainActivity extends AppCompatActivity {

    BottomNavigationView bottomNavigationView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //slider
        showHomeFragment();
        
        //navbot
        bottomNavigationView = findViewById(R.id.bottom_nav);

        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                FragmentManager manager = getSupportFragmentManager();
                FragmentTransaction transaction = manager.beginTransaction();
                switch (item.getItemId()){
                    case R.id.menu_home:
                        transaction.replace(R.id.fragment_container, new HomeFragment());
                        transaction.commit();
                        break;
                    case R.id.menu_cart:
                        transaction.replace(R.id.fragment_container, new CartFragment());
                        transaction.commit();
                        break;
                    case R.id.menu_profile:
                        transaction.replace(R.id.fragment_container, new ProfileFragment());
                        transaction.commit();
                        break;
                }
                return true;
            }
        });
    }

    private void showHomeFragment() {
        FragmentManager manager = getSupportFragmentManager();
        FragmentTransaction transaction = manager.beginTransaction();
        transaction.replace(R.id.fragment_container, new HomeFragment());
        transaction.commit();
    }
}