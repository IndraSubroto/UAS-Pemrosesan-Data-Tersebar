package com.example.uasoracle.model;
/**
 * Created by Sandri Alfarisi.
 * github : https://github.com/sandrialfarisi
 */
import com.google.gson.annotations.SerializedName;

public class BarangItem {
    @SerializedName("kd_barang")
    private String kd_barang;
    @SerializedName("nm_barang")
    private String nm_barang;
    @SerializedName("jml_barang")
    private String jml_barang;
    @SerializedName("harga")
    private String harga;


    public String getKd_barang() {
        return kd_barang;
    }

    public void setKd_barang(String kd_barang) {
        this.kd_barang = kd_barang;
    }

    public String getNm_barang() {
        return nm_barang;
    }

    public void setNm_barang(String nm_barang) {
        this.nm_barang = nm_barang;
    }

    public String getJml_barang() {
        return jml_barang;
    }

    public void setJml_barang(String jml_barang) {
        this.jml_barang = jml_barang;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }


    @Override
    public String toString(){
        return
                "SemuaPenjualanItem{" +
                        "kd_barang = '" + kd_barang + '\'' +
                        ",nm_barang = '" + nm_barang + '\'' +
                        ",jml_barang = '" + jml_barang + '\'' +
                        ",harga = '" + harga + '\'' +
                        "}";

    }
}
