package ppeteam.myapplication.MainFeature;
import android.content.ContentValues;
import android.content.Context;
import android.util.Log;
import android.database.DatabaseErrorHandler;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DatabaseHelper extends SQLiteOpenHelper {

    private static String TAG="DatabaseHelper";
    private static String TABLE_NAMEevent = "Event";
    private static String COL1 = "ID_event";
    private static String COL2 = "ID_Utilisateur";
    private static String COL3 = "chemin_l_imagine_event";
    private static String COL4 = "lieu";
    private static String COL5 = "recette";

    public DatabaseHelper(Context context){
        super(context, TABLE_NAMEevent, null,1);
    }
    @Override
    public void onCreate(SQLiteDatabase db) {
        String createtableevent = " CREATE TABLE " + TABLE_NAMEevent + "(ID_event PRIMARY KEY AUTOINCREMENT, " + COL1 + "TEXT" + COL2 + "TEXT ," + COL3 + "TEXT," + COL4 + "TEXT" + COL5 + "TEXT)";
        db.execSQL(createtableevent);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL(" DROP TABLE IF EXISTS " + TABLE_NAMEevent);
        onCreate(db);
    }

    public boolean addevent(String recette,String lieu,String chemin_l_imagine_event,int ID_utilisateur){
        SQLiteDatabase db =this.getWritableDatabase();
        ContentValues value= new ContentValues();
        value.put(COL2,ID_utilisateur);
        value.put(COL3,chemin_l_imagine_event);
        value.put(COL4,lieu);
        value.put(COL5,recette);
        Log.d(TAG, " appData: adding " + lieu +" to "+ TABLE_NAMEevent );
        long result =db.insert(TABLE_NAMEevent, null, value);
        if(result==-1){
            return false;
        }else{
            return true;
        }

    }
}
