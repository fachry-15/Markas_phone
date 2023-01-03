package com.example.finalpr.models;

import javax.annotation.Generated;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

@Generated("jsonschema2pojo")
public class ProductResult {

    @SerializedName("id_barang")
    @Expose
    private String idBarang;
    @SerializedName("merek")
    @Expose
    private String merek;
    @SerializedName("nama_hp")
    @Expose
    private String namaHp;
    @SerializedName("spesifikasi")
    @Expose
    private String spesifikasi;
    @SerializedName("harga")
    @Expose
    private String harga;
    @SerializedName("url_gambar")
    @Expose
    private String urlGambar;

    public String getIdBarang() {
        return idBarang;
    }

    public void setIdBarang(String idBarang) {
        this.idBarang = idBarang;
    }

    public String getMerek() {
        return merek;
    }

    public void setMerek(String merek) {
        this.merek = merek;
    }

    public String getNamaHp() {
        return namaHp;
    }

    public void setNamaHp(String namaHp) {
        this.namaHp = namaHp;
    }

    public String getSpesifikasi() {
        return spesifikasi;
    }

    public void setSpesifikasi(String spesifikasi) {
        this.spesifikasi = spesifikasi;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }

    public String getUrlGambar() {
        return urlGambar;
    }

    public void setUrlGambar(String urlGambar) {
        this.urlGambar = urlGambar;
    }

}