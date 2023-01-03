package com.example.finalpr.fragment;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.provider.ContactsContract;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.finalpr.MainActivity;
import com.example.finalpr.R;
import com.example.finalpr.databinding.FragmentProfileBinding;
import com.example.finalpr.logres.LoginActivity;

public class ProfileFragment extends Fragment {

    private FragmentProfileBinding binding;
    TextView tvp4;
    SharedPreferences sharedPreferences;
    Button btn;

    public ProfileFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_profile, container, false);

        tvp4 = view.findViewById(R.id.p_username);
        sharedPreferences = getActivity().getSharedPreferences("markasphone", Context.MODE_PRIVATE);


        tvp4.setText(getActivity().getIntent().getStringExtra("username"));

        btn = view.findViewById(R.id.btnLogout);
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), LoginActivity.class);
                intent.putExtra("key",tvp4.getText().toString());
                startActivity(intent);
            }
        });

        if(sharedPreferences.contains("username")){
            tvp4.setText(sharedPreferences.getString("username", ""));
        }

        return view;
    }

    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }


}
