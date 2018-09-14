import processing.core.*; 
import processing.data.*; 
import processing.event.*; 
import processing.opengl.*; 

import processing.net.*; 
import de.bezier.data.sql.*; 
import processing.serial.*; 

import java.util.HashMap; 
import java.util.ArrayList; 
import java.io.File; 
import java.io.BufferedReader; 
import java.io.PrintWriter; 
import java.io.InputStream; 
import java.io.OutputStream; 
import java.io.IOException; 

public class TEST_SQL extends PApplet {






Serial myPort;  // Create object from Serial class
String val;     // Data received from the serial port
float intVal;
float numval;

MySQL dbconnection;

public void setup()
{

  String portName = Serial.list()[0]; //change the 0 to a 1 or 2 etc. to match your port
  myPort = new Serial(this, portName, 9600);
  String user     = "root";
  String pass     = "";
  String database = "test";
        // connect to database of server "localhost"
  dbconnection = new MySQL( this, "localhost", database, user, pass );
        
}

public void draw()
{
  //database connection
        
  float prev_value = 0;
  //int count = 0;
  String sensor_id = "S01";
  int yrs = year();
  int d = day();
  int mnth = month();
  int hr = hour();
  int min = minute();
  int sec = second();
  
  String date_time = yrs+"-"+mnth+"-"+d+" "+hr+":"+min+":"+sec;
  while ( myPort.available() > 0) 
  {  // If data is available,
    int delay = 0;
      while( delay < 2000)
      {
        delay++;
      }
      val =myPort.readStringUntil('\n'); // read it and store it in val
      if(val != null)
      {
       
        numval = PApplet.parseFloat(val);
        float difference;
        if (prev_value > numval)
        {
         difference = prev_value - numval;
        }
        else
        {
          difference = numval - prev_value;
        }
         
        if((prev_value != numval) && (difference > 5))
        {
         
           println(numval);
           if( dbconnection.connect() )
            {
            
            // now send data to database
            dbconnection.execute( "INSERT INTO `sensor_data` (`reading`,`sensor_id`, `insert_time`) VALUES ('"+numval+"', '"+sensor_id+"', '"+date_time+"');" );
            
            //println("Insert successfull");
            
            }
            prev_value = numval;
        }
      }
      else
      {
       // println("equal");
        println(numval);
      }

  } 

}
  static public void main(String[] passedArgs) {
    String[] appletArgs = new String[] { "TEST_SQL" };
    if (passedArgs != null) {
      PApplet.main(concat(appletArgs, passedArgs));
    } else {
      PApplet.main(appletArgs);
    }
  }
}
