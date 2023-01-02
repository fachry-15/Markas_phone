package com.example.finalpr.adapters;


public class User {

    int id_user;
    String email,Alamat_utama,No_telepon,username;

    public User(int id_user, String email, String Alamat_utama, String No_telepon, String username) {
        this.id_user = id_user;
        this.email = email;
        this.Alamat_utama = Alamat_utama;
        this.No_telepon = No_telepon;
        this.username = username;
    }

    public int getId() {
        return id_user;
    }

    public void setId(int id) {
        this.id_user = id_user;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getAlamat_utama() {
        return Alamat_utama;
    }

    public void setAlamat_utama(String Alamat_utama) {
        this.Alamat_utama = Alamat_utama;
    }

    public String getNo_telepon() {
        return No_telepon;
    }

    public void setNo_telepon(String No_telepon) {
        this.No_telepon = No_telepon;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

}

