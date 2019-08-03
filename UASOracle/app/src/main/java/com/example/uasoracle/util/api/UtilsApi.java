package com.example.uasoracle.util.api;

/**
 * Created by Sandri Alfarisi.
 * github : https://github.com/sandrialfarisi
 */
public class UtilsApi {

    public static final String BASE_URL_API = "http://192.168.43.75:8888/apex/obe/";

    public static BaseApiService getAPIService(){
        return RetrofitClient.getClient(BASE_URL_API).create(BaseApiService.class);
    }
}
