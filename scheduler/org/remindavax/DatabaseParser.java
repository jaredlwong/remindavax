package org.remindavax;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;

// Notice, do not import com.mysql.jdbc.*
// or you will have problems!

public class DatabaseParser {
	protected static Connection conn = null;
	protected static Statement stmnt = null;
	protected static ResultSet rs = null;

	public DatabaseParser(String table) {
		try {
			conn = DriverManager
					.getConnection("jdbc:mysql://127.0.0.1/remindavax?"
							+ "user=remindavax&password=remindavax!!");
			stmnt = conn.createStatement();
			stmnt.execute("SELECT * FROM " + table);
			rs = stmnt.getResultSet();

		} catch (SQLException ex) {
			System.err.println("SQLException: " + ex.getMessage());
			System.err.println("SQLState: " + ex.getSQLState());
			System.err.println("VendorError: " + ex.getErrorCode());
		} catch (Exception e) {
			System.err.println(e.getMessage());
		}
	}
}
