package ppeteam.myapplication.MainFeature;

import android.content.ContentValues;
import android.content.Context;
import android.database.DatabaseErrorHandler;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DatabaseHelper extends SQLiteOpenHelper {




    private static String TAG="DatabaseHelper";
    private static String TABLE_NAMEevent="Event";
    private static String COL1="ID_recette";
    private static String COL2="ID_Utilisateur";
    private static String COL3="chemin_l_imagine_event";
    private static String COL4="lieu";
    private static String COL5="recette";


    @Override
    public void onCreate(SQLiteDatabase db) {
        String createTable= ;
    }
        String createtableevent =" CREATE TABLE" + TABLE_NAMEevent + "(ID_recette PRIMARY KEY" + COL2 + "TEXT ,"+ COL3 +"TEXT,"+COL4+"TEXT"+COL5+"TEXT)";
    db.execSQL(createtableevent);

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP IF TABLE EXISTS"+ TABLE_NAMEevent);
        onCreate(db);
    }
    public DatabaseHelper(Context context){
        super(context, TABLE_NAME, null);
    }
    public boolean addevent(String recette,String lieu,String chemin_l_imagine_event){
        SQLiteDatabase db =this.getWritableDatabase();
        ContentValues value= new ContentValues();
        value.put()
    }
}
