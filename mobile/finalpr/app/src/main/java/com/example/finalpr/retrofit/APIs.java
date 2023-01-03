package com.example.finalpr.retrofit;

import com.example.finalpr.models.CartData;
import com.example.finalpr.models.ProductResult;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;

public interface APIs{
        String BASE_URL = "https://markas-phone.000webhostapp.com/markas/";

        @GET("Api.php")
        Call<List<ProductResult>> getProducts();

    @GET("cart.php")
    Call<List<CartData>> getcart();
    }
