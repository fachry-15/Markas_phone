package com.example.finalpr.retrofit;

import com.example.finalpr.adapters.LoginResponse;
import com.example.finalpr.models.ProductResult;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface APIs{
        String BASE_URL = "https://markas-phone.000webhostapp.com/markas/";

        @GET("Api.php")
        Call<List<ProductResult>> getProducts();

    @FormUrlEncoded
    @POST("login.php")
    Call<LoginResponse> login(
            @Field("username") String username,
            @Field("password") String password
    );

    @GET("Fetchusers.php")
    Call<FetchUserResponse> fetchAllUsers();

    }
