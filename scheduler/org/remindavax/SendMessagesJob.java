package org.remindavax;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

import org.quartz.Job;
import org.quartz.JobExecutionContext;
import org.quartz.JobExecutionException;

import com.twilio.sdk.TwilioRestClient;
import com.twilio.sdk.TwilioRestException;
import com.twilio.sdk.resource.factory.SmsFactory;
import com.twilio.sdk.resource.instance.Account;

public class SendMessagesJob extends DatabaseParser implements Job {
	protected static HashMap<String, String> messageQueue = null;

	public SendMessagesJob() {
		super("Queue");
		messageQueue = new HashMap<String, String>();
	}

	public void execute(JobExecutionContext context)
			throws JobExecutionException {
		System.err.println("Hello!  HelloJob is executing.");
	}

	public static void asdf(String args[]) {
		long start = System.nanoTime();
		sendTwilioMessage("4088960767",
				"Shit Piss Fuck Cunt Cocksucker Motherfucker Tits");
		long end = System.nanoTime();
		System.out.println(end - start);
	}

	public static void main(String args[]) {
		new SendMessagesJob();
		Statement prescr = null;
		ResultSet prescrRs = null;
		try {
			while (rs.next()) {
				prescr = conn.createStatement();
				String stExec = "SELECT * FROM `Prescriptions` WHERE id="
						+ rs.getString("prescriptionId");
				prescr.execute(stExec);
				prescrRs = prescr.getResultSet();
				prescrRs.next();
				queueMessageIfTime(prescrRs);
			}
			
			// Logic to iterate through the hashmap of messages to be sent
			// and then send the messages with Twilio
			Iterator<String> keyIter = messageQueue.keySet().iterator();
			while (keyIter.hasNext()) {
				String keyphone = keyIter.next();
				String msg = messageQueue.get(keyphone);
				String sqlmsg = msg
						+ " Text back \\'itookit\\' to affirm that you have taken your prescribed drug(s).";
				msg += " Text back 'itookit' to affirm that you have taken your prescribed drug(s).";

				Statement insert = conn.createStatement();
				String execst = "INSERT INTO `Messages` (phone, message) "
						+ "VALUES ('" + keyphone + "'," + "'" + sqlmsg + "')";
				insert.executeUpdate(execst);
				sendTwilioMessage("4088960767", msg);
				System.out.println(keyphone + " <= " + msg);
			}
		} catch (SQLException e) {
			System.err.println("SQLException: " + e.getMessage());
			System.err.println("SQLState: " + e.getSQLState());
			System.err.println("VendorError: " + e.getErrorCode());
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
			try {
				if (rs != null)
					rs.close();
				rs = null;
				if (stmnt != null)
					stmnt.close();
				stmnt = null;
				if (conn != null)
					conn.close();
				conn = null;
				if (prescr != null)
					prescr.close();
				prescr = null;
				if (prescrRs != null)
					prescrRs.close();
				prescrRs = null;
			} catch (SQLException sqlEx) {
			}
		}
	}

	protected static boolean queueMessageIfTime(ResultSet prescrRs)
			throws SQLException {
		GregorianCalendar current = new GregorianCalendar();
		int curMinute = current.get(Calendar.HOUR_OF_DAY) * 60
				+ current.get(Calendar.MINUTE);

		boolean xSnotB = prescrRs.getBoolean("xSnotB");
		int xSummaryTime = prescrRs.getInt("xSummaryTime");
		int xBeforeMins = prescrRs.getInt("xBeforeMins");
		int xMedTime = prescrRs.getInt("xMedTime");
		// int xWarningAfterLast = prescrRs.getInt("xWarningAfterLast");
		int xEndTime = prescrRs.getInt("xEndTime");
		boolean preNotWarn = (rs.getInt("PreNotWarn") == 1);

		if (preNotWarn && curMinute < xMedTime) {
			if (xSnotB) {
				if (Math.abs(curMinute - xSummaryTime) < 3) {
					queueMessage(0, prescrRs); // summary message
					return true;
				}
			} else {
				if (Math.abs(curMinute - (xMedTime - xBeforeMins)) < 3) {
					queueMessage(1, prescrRs); // before message
					return true;
				}
			}
		} else {
			/*
			 * if (Math.abs(curMinute - (xMedTime + xWarningAfterLast)) < 3) {
			 * queueMessage(2, prescrRs); // warning message return true; }
			 */
			if (Math.abs(curMinute - xEndTime) < 3) {
				queueMessage(3, prescrRs); // didn't take message
				return true;
			}
		}
		return false;
	}

	protected static void queueMessage(int type, ResultSet prescrRs)
			throws SQLException {

		int id = prescrRs.getInt("patientId");

		ResultSet patientsRs = getSelection("Patients", "id=" + id);

		if (type <= 1) {
			ResultSet drugRs = getSelection("Drugs",
					"id=" + prescrRs.getString("xDrug"));

			ResultSet treatmentRs = getSelection("Treatments",
					"id=" + drugRs.getString("treatment"));

			String drugmsg = drugRs.getString("name") + " for "
					+ treatmentRs.getString("name");

			String phone = patientsRs.getString("phone");

			int time = prescrRs.getInt("xMedTime");
			String tstr = "" + (time / 60) + ":" + (time % 60);
			String msg = "Take " + drugmsg + " at " + tstr + ".";
			if (messageQueue.get(id) != null) {
				msg = messageQueue.get(id) + " " + msg;
			}
			messageQueue.put(phone, msg);
		} else {
			int warnDPF = rs.getInt("WarnDPF");
			ResultSet who = null;
			int whoid = rs.getInt("WarnId");
			String whotable = null;
			String patientName = patientsRs.getString("firstName") + " "
					+ patientsRs.getString("lastName");
			String msg = patientName
					+ " did not take their medication for the day.";

			switch (warnDPF) {
			case 0: // Doctor
				whotable = "Doctors";
				break;
			/*
			 * case 1: // Patient msg =
			 * "Remember to text back \\'itookit\\' by " + (endtime / 60) + ":"
			 * + (endtime % 60) + "."; whotable = "Patients"; break;
			 */
			case 2: // Family
				whotable = "Family";
				break;
			}
			who = getSelection(whotable, "id=" + whoid);
			messageQueue.put(who.getString("phone"), msg);
		}
	}

	protected static ResultSet getSelection(String table, String where)
			throws SQLException {
		Statement stmnt = null;
		ResultSet rs = null;
		stmnt = conn.createStatement();
		String execstmnt = "SELECT * FROM `" + table + "` WHERE " + where;
		stmnt.execute(execstmnt);
		rs = stmnt.getResultSet();
		rs.next();
		return rs;
	}

	protected static void sendTwilioMessage(String phone, String msg) {
		// Create a rest client
		TwilioRestClient client = new TwilioRestClient(
				"AC7cebc0d2cfc248c9a299a00d057f13a5",
				"a95b1bfe9803bf4916b921658de16bd9");

		// Get the main account (The one we used to authenticate the client)
		Account mainAccount = client.getAccount();

		// Send an sms
		SmsFactory smsFactory = mainAccount.getSmsFactory();
		Map<String, String> smsParams = new HashMap<String, String>();
		smsParams.put("To", phone); // Replace with a valid phone number
		smsParams.put("From", "(415) 599-2671"); // Replace with a valid phone
													// number in your account
		smsParams.put("Body", msg);
		try {
			smsFactory.create(smsParams);
		} catch (TwilioRestException e) {
			e.printStackTrace();
		}
	}
}
