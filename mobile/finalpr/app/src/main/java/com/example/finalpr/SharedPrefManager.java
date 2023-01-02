package com.example.finalpr;

import android.content.Context;
import android.content.SharedPreferences;

import com.example.finalpr.adapters.User;

public class SharedPrefManager {

    private static String SHARED_PREF_NAME="markasphone";
    private SharedPreferences sharedPreferences;
    Context context;
    private SharedPreferences.Editor editor;


    public SharedPrefManager(Context context) {
        this.context = context;
    }

    public void saveUser(User user){
        sharedPreferences=context.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        editor=sharedPreferences.edit();
        editor.putInt("id_user",user.getId());
        editor.putString("email",user.getEmail());
        editor.putString("Alamat_utama",user.getAlamat_utama());
        editor.putString("No_telepon",user.getNo_telepon());
        editor.putString("username",user.getUsername());

        editor.putBoolean("logged",true);
        editor.apply();


    }

   public boolean isLoggedIn(){
       sharedPreferences=context.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
       return sharedPreferences.getBoolean("logged",false);
    }


    public User getUser(){
        sharedPreferences=context.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return new User(sharedPreferences.getInt("id_user",-1),
                sharedPreferences.getString("email",null),
                sharedPreferences.getString("Alamat_utama",null),
                sharedPreferences.getString("No_telepon",null),
                sharedPreferences.getString("username",null));
    }


   public void logout(){
        sharedPreferences=context.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        editor=sharedPreferences.edit();
        editor.clear();
        editor.apply();

        }
}
