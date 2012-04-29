package org.remindavax;

import java.math.BigInteger;
import java.security.SecureRandom;
import java.sql.Date;
import java.sql.ResultSet;
import java.sql.SQLException;

import org.quartz.Job;
import org.quartz.JobExecutionContext;
import org.quartz.JobExecutionException;
import java.sql.Statement;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.Iterator;

public class QueueJob extends DatabaseParser implements Job {
	
    public QueueJob() {
    	super("Prescriptions");
    }
    
    public static void main(String args[]) {
    	run();
    }

    public void execute(JobExecutionContext context) throws JobExecutionException
    {
		HashMap<Integer, Integer> patientDayEndTime = new HashMap<Integer, Integer>();
		Statement insert = null;
		try {
			while (rs.next()) {
				if (isDay(rs)) {
					insert = conn.createStatement();
					insert.executeUpdate("INSERT INTO `Queue` (PreNotWarn, prescriptionId) "
							+ "VALUES (1," + rs.getInt("id") + ")");

					// Logic for describing the last end time of all
					// prescriptions given to each patient
					int prscrEndTime = rs.getInt("xEndTime");
					int patId = rs.getInt("patientId");
					
					Integer preId = patientDayEndTime.get(patId);
					Statement prestmnt = conn.createStatement();
					ResultSet prers = null;
					if( preId != null) {
						String presearch = "SELECT * FROM `Prescriptions` WHERE id=" + preId;
						prestmnt.execute(presearch);
						prers = prestmnt.getResultSet();
						prers.next();
						int endtime = prers.getInt("xEndTime");
						if ( endtime < prscrEndTime) {
							patientDayEndTime.put(patId, rs.getInt("id"));
						}
					} else {
						patientDayEndTime.put(patId, rs.getInt("id"));
					}
				}
			}
			
			Statement stmnt = null;
			ResultSet rs = null;
			stmnt = conn.createStatement();
			
			// Logic to iterate through all of the items in patientDayEndTime
			// and queue up special messages to doctors
			Iterator<Integer> keyIter = patientDayEndTime.keySet().iterator();
			while (keyIter.hasNext()) {
				Integer patId = keyIter.next();
				Integer prscrId = patientDayEndTime.get(patId);
				
				// Get patient by ID
				String patstmnt = "SELECT * FROM `Patients` WHERE id=" + patId;
				stmnt.execute(patstmnt);
				rs = stmnt.getResultSet();
				rs.next();
				
				insert = conn.createStatement();
				insert.executeUpdate("INSERT INTO `Queue` (PreNotWarn, prescriptionId, WarnDPF, WarnId) "
						+ "VALUES (0," + prscrId + ", 0, " + rs.getString("doctorId") +")");
				
				// get the patient's doctor
				// queue a message with the patient's name saying that they did
				// not take their medication, whether this is or is not true
				// does not matter
				// queue it for the prescribed end time
			}
			
		} catch (SQLException e) {
    	    System.err.println("SQLException: " + e.getMessage());
    	    System.err.println("SQLState: " + e.getSQLState());
    	    System.err.println("VendorError: " + e.getErrorCode());
		} catch (Exception e) {
    		e.printStackTrace();
    	} finally {
    		if (rs != null) {
    	        try {rs.close();} catch (SQLException sqlEx) { }
    	        rs = null;
    	    }
    	    if (stmnt != null) {
    	        try {stmnt.close();} catch (SQLException sqlEx) { }
    	        stmnt = null;
    	    }
    	    if (conn != null) {
    	        try {conn.close();} catch (SQLException sqlEx) { }
    	        conn = null;
    	    }
    	}
    }
    
    protected static void run() {
    	new QueueJob();
    	if( rs == null ) {
    		System.out.println("something");
    	}
    	HashMap<Integer, Integer> patientDayEndTime = new HashMap<Integer, Integer>();
		Statement insert = null;
		try {
			while (rs.next()) {
				if (isDay(rs)) {
					insert = conn.createStatement();
					insert.executeUpdate("INSERT INTO `Queue` (PreNotWarn, prescriptionId) "
							+ "VALUES (1," + rs.getInt("id") + ")");

					// Logic for describing the last end time of all
					// prescriptions given to each patient
					int prscrEndTime = rs.getInt("xEndTime");
					int patId = rs.getInt("patientId");
					
					Integer preId = patientDayEndTime.get(patId);
					Statement prestmnt = conn.createStatement();
					ResultSet prers = null;
					if( preId != null) {
						String presearch = "SELECT * FROM `Prescriptions` WHERE id=" + preId;
						prestmnt.execute(presearch);
						prers = prestmnt.getResultSet();
						prers.next();
						int endtime = prers.getInt("xEndTime");
						if ( endtime < prscrEndTime) {
							patientDayEndTime.put(patId, rs.getInt("id"));
						}
					} else {
						patientDayEndTime.put(patId, rs.getInt("id"));
					}
				}
			}
			
			Statement stmnt = null;
			ResultSet rs = null;
			stmnt = conn.createStatement();
			
			// Logic to iterate through all of the items in patientDayEndTime
			// and queue up special messages to doctors
			Iterator<Integer> keyIter = patientDayEndTime.keySet().iterator();
			while (keyIter.hasNext()) {
				Integer patId = keyIter.next();
				Integer prscrId = patientDayEndTime.get(patId);
				
				// Get patient by ID
				String patstmnt = "SELECT * FROM `Patients` WHERE id=" + patId;
				stmnt.execute(patstmnt);
				rs = stmnt.getResultSet();
				rs.next();
				
				insert = conn.createStatement();
				insert.executeUpdate("INSERT INTO `Queue` (PreNotWarn, prescriptionId, WarnDPF, WarnId) "
						+ "VALUES (0," + prscrId + ", 0, " + rs.getString("doctorId") +")");
			}
			
		} catch (SQLException e) {
    	    System.err.println("SQLException: " + e.getMessage());
    	    System.err.println("SQLState: " + e.getSQLState());
    	    System.err.println("VendorError: " + e.getErrorCode());
		} catch (Exception e) {
    		e.printStackTrace();
    	} finally {
    		if (rs != null) {
    	        try {rs.close();} catch (SQLException sqlEx) { }
    	        rs = null;
    	    }
    	    if (stmnt != null) {
    	        try {stmnt.close();} catch (SQLException sqlEx) { }
    	        stmnt = null;
    	    }
    	    if (conn != null) {
    	        try {conn.close();} catch (SQLException sqlEx) { }
    	        conn = null;
    	    }
    	}
    }
    
    protected static boolean isDay(ResultSet rs) throws Exception {
    	GregorianCalendar current = new GregorianCalendar();

		Date begin = rs.getDate("begin");
    	Date end = rs.getDate("end");
    	
    	if( current.getTime().after(begin) && current.getTime().before(end) ) {
    		CronSubExpression dom = new CronSubExpression(rs.getString("dom"), "dom");
    	// Days of months are 1-31
    	if( dom.isValid(current.get(Calendar.DAY_OF_MONTH)) ) {
    		CronSubExpression mon = new CronSubExpression(rs.getString("mon"), "mon");
    	// Months are 0-11
    	if( mon.isValid(current.get(Calendar.MONTH) + 1) ) {
    		CronSubExpression dow = new CronSubExpression(rs.getString("dow"), "dow");
    	// Sundays are 1, Saturdays 7
    	if( dow.isValid(current.get(Calendar.DAY_OF_WEEK)) ) {
    		CronSubExpression year = new CronSubExpression(rs.getString("year"), "year");
    	// Year is exact
    	if( year.isValid(current.get(Calendar.YEAR)) ) {
    		return true;
    	}}}}}
    	
    	return false;
    }
    
    protected static String generateCode() {
    	SecureRandom srandom = new SecureRandom();
    	String rand = new BigInteger(4*10, srandom).toString(32);
    	return rand;
    }
}
