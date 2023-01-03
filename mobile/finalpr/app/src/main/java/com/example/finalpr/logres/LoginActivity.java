package com.example.finalpr.logres;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.finalpr.MainActivity;

import com.example.finalpr.R;
import com.google.android.material.textfield.TextInputEditText;
import com.vishnusivadas.advanced_httpurlconnection.PutData;

public class LoginActivity extends AppCompatActivity {

    TextInputEditText textInputEditTextUsername, textInputEditTextPassword, textInputEditTextEmail, textInputEditTextNotelp, textInputEditTextAlamat;
    Button buttonLogin;
    TextView textViewSignUp,txv;
    ProgressBar progressBar;
    SharedPreferences sharedPreferences;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        textInputEditTextUsername = findViewById(R.id.username);
        textInputEditTextPassword = findViewById(R.id.password);
        buttonLogin = findViewById(R.id.buttonLogin);
        textViewSignUp = findViewById(R.id.signUpText);
        progressBar = findViewById(R.id.progress);
        txv = findViewById(R.id.textView1);


        Intent intent = getIntent();
        String s = intent.getStringExtra("key");
        txv.setText(s);

        textViewSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(), SignUpActivity.class);
                startActivity(intent);
                finish();
            }
        });

        buttonLogin.setOnClickListener(new View.OnClickListener() {
                                           @Override
                                           public void onClick(View v) {
                                               final String username, password, email, No_telepon, Alamat_utama;
                                               username = String.valueOf(textInputEditTextUsername.getText());
                                               password = String.valueOf(textInputEditTextPassword.getText());

                                               if (!username.equals("") && !password.equals("")) {
                                                   progressBar.setVisibility(View.VISIBLE);
                                                   Handler handler = new Handler();
                                                   handler.post(new Runnable() {
                                                       @Override
                                                       public void run() {
                                                           String[] field = new String[2];
                                                           field[0] = "username";
                                                           field[1] = "password";
                                                           String[] data = new String[2];
                                                           data[0] = username;
                                                           data[1] = password;
                                                           PutData putData = new PutData("https://markas-phone.000webhostapp.com/markas/login.php", "POST", field, data);
                                                           if (putData.startPut()) {
                                                               if (putData.onComplete()) {
                                                                   progressBar.setVisibility(View.GONE);
                                                                   String result = putData.getResult();
                                                                   if (result.equals("Login Success")) {
                                                                       Toast.makeText(getApplicationContext(), result, Toast.LENGTH_SHORT).show();
                                                                       Intent intent = new Intent(getApplicationContext(), MainActivity.class);
                                                                       intent.putExtra("username", username);
                                                                       startActivity(intent);
                                                                       finish();
                                                                   } else {
                                                                       Toast.makeText(getApplicationContext(), result, Toast.LENGTH_SHORT).show();
                                                                   }
                                                               }
                                                           }
                                                       }
                                                   });
                                               } else {
                                                   Toast.makeText(getApplicationContext(), "All fields required", Toast.LENGTH_SHORT).show();
                                               }
                                           }
                                       }
        );
    }
}