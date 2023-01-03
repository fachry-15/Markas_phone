package com.example.finalpr.models;

import com.google.gson.annotations.SerializedName;

public class CartData {
        @SerializedName("id_pembelian")
        private Integer id_pembelian;
        @SerializedName("username")
        private String username;
        @SerializedName("id_barang")
        private Integer id_barang;
        @SerializedName("barang")
        private String barang;
        @SerializedName("harga")
        private Integer harga;
        @SerializedName("jumlah")
        private Integer jumlah;
        @SerializedName("gambar")
        private String gambar;

        public CartData(String id_pembelian, String barang, String harga, String jumlah, String gambar) {
            this.id_pembelian = Integer.valueOf(id_pembelian);
            this.barang = barang;
            this.harga = Integer.valueOf(harga);
            this.jumlah = Integer.valueOf(jumlah);
            this.gambar = gambar;
        }

        public CartData() {

        }

        public Integer getId_pembelian() {
            return id_pembelian;
        }

        public void setId_pembelian(Integer id_pembelian) {
            this.id_pembelian = id_pembelian;
        }

        public String username() {
            return username;
        }

        public void setUsername(String username) {
            this.username = username;
        }

        public Integer getId_barang() {
            return id_barang;
        }

        public void setId_barang(Integer id_barang) {
            this.id_barang = id_barang;
        }

        public String getBarang() {
            return barang;
        }

        public void setBarang(String barang) {
            this.barang = barang;
        }

        public Integer getHarga() {
            return harga;
        }

        public void setHarga(Integer harga) {
            this.harga = harga;
        }

        public Integer getJumlah() {
            return jumlah;
        }

        public void setJumlah(Integer jumlah) {
            this.jumlah = jumlah;
        }

        public String getGambar() {
            return gambar;
        }

        public void setGambar(String gambar) {
            this.gambar = gambar;
        }

    }

