package ppeteam.myapplication.MainFeature;

import android.content.Context;
import android.database.DatabaseErrorHandler;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DatabaseHelper extends SQLiteOpenHelper {




    private static String TAG="DatabaseHelper";
    private static String TABLE_NAME="Event";
    private static String COL1="ID_recette";
    private static String COL2="ID_Utilisateur";
    private static String COL3="chemin_l_imagine_event";
    private static String COL4="lieu";
    private static String COL5="recette";
    private static ;

    @Override
    public void onCreate(SQLiteDatabase db) {
        String createTable= ;
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
    public DatabaseHelper(Context context){
        super(context, TABLE_NAME, null);
    }
}
