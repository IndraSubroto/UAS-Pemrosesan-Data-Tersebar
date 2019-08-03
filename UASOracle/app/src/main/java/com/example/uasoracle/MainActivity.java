package com.example.uasoracle;
/**
 * Created by Sandri Alfarisi.
 * github : https://github.com/sandrialfarisi
 */
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.example.uasoracle.model.BarangItem;
import com.example.uasoracle.model.ResponseBarang;
import com.example.uasoracle.util.api.BaseApiService;
import com.example.uasoracle.util.api.UtilsApi;


import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {
    ProgressDialog loading;
    Context mContext;
    BaseApiService mApiService;
    List<String> listSpinner = new ArrayList<String>();
    List<String> listNama = new ArrayList<String>();
    List<String> listJumlah = new ArrayList<String>();
    List<String> listHarga = new ArrayList<String>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Spinner spin = (Spinner) findViewById(R.id.spinner);
        TextView nama = (TextView) findViewById(R.id.namabarang);
        TextView jumlah = (TextView) findViewById(R.id.jumlahbarang);
        TextView harga = (TextView) findViewById(R.id.hargabarang);
        mContext = this;
        mApiService = UtilsApi.getAPIService();

        initSpinnerDosen();

        spin.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                String selectedNama = listNama.get(position);
                String selectedJumlah = listJumlah.get(position);
                String selectedHarga = listHarga.get(position);
                nama.setText(selectedNama);
                jumlah.setText(selectedJumlah);
                harga.setText(selectedHarga);
                Toast.makeText(mContext, "Kamu Memilih " + selectedNama, Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

    }

        private void initSpinnerDosen () {
            loading = ProgressDialog.show(mContext, null, "harap tunggu...", true, false);

            mApiService.getSemuaBarang().enqueue(new Callback<ResponseBarang>() {
                @Override
                public void onResponse(Call<ResponseBarang> call, Response<ResponseBarang> response) {
                    if (response.isSuccessful()) {
                        loading.dismiss();
                        List<BarangItem> semuabarangItems = response.body().getSemuabarang();

                        for (int i = 0; i < semuabarangItems.size(); i++) {
                            String kode = semuabarangItems.get(i).getKd_barang();
                            String nama = semuabarangItems.get(i).getNm_barang();
                            String jumlah = semuabarangItems.get(i).getJml_barang();
                            String harga = semuabarangItems.get(i).getHarga();
                            listSpinner.add(kode);
                            listNama.add(nama);
                            listJumlah.add(jumlah);
                            listHarga.add(harga);
                        }

                        Spinner spin = (Spinner) findViewById(R.id.spinner);
                        spin.setAdapter(new ArrayAdapter<String>(MainActivity.this, android.R.layout.simple_spinner_dropdown_item, listSpinner));
//                        ArrayAdapter<String> adapter = new ArrayAdapter<String>(MainActivity.this,
//                                android.R.layout.simple_spinner_item, listSpinner);
//                        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
//                        spinner.setAdapter(adapter);
                    } else {
                        loading.dismiss();
                        Toast.makeText(mContext, "Gagal mengambil data barang", Toast.LENGTH_SHORT).show();
                    }
                }

                @Override
                public void onFailure(Call<ResponseBarang> call, Throwable t) {
                    loading.dismiss();
                    Toast.makeText(mContext, "Koneksi internet bermasalah", Toast.LENGTH_SHORT).show();
                }
            });
        }
}

