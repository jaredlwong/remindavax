package org.remindavax;

import java.util.Arrays;
import java.util.HashMap;

public class CronSubExpression {
	private int[] representedNums;
	private int aryOffset;
	private static final HashMap<String, Integer> typeMap;
	static {
		HashMap<String, Integer> tmp = new HashMap<String, Integer>(4);
		tmp.put("dom", 31);
		tmp.put("mon", 12);
		tmp.put("dow", 7);
		tmp.put("year", 130);
		typeMap = tmp;
	}
	private static final HashMap<String, Integer> offsetMap;
	static {
		HashMap<String, Integer> tmp = new HashMap<String, Integer>(4);
		tmp.put("dom", 1);
		tmp.put("mon", 1);
		tmp.put("dow", 1);
		tmp.put("year", 1970);
		offsetMap = tmp;
	}
	
	public CronSubExpression(String cronExp, String type) throws Exception {
		Object length = typeMap.get(type);
		if (length != null) {
			representedNums = new int[(Integer) length];
		}
		
		Object offset = offsetMap.get(type);
		if (offset != null) {
			aryOffset = (Integer) offset;
		}
		if( !expand(cronExp) ) {
			throw new Exception("Invalid cron expression or type");
		}
	}
	
	private boolean expand(String cronExp) {

		String[] minors = cronExp.split(",");
		
		// A '?' should represent a lenient value
		// This will be represented by a null array
		// A '*' should represent all the values of a type
		// We return an array of the types size with values of 1
		if( minors[0].equals("*") || minors[0].equals("?")) {
			Arrays.fill(representedNums,1);
			return true;
		}
		
		for( String sub: minors ) {
			if( sub.contains("-") ) {
				String[] rangeAry = sub.split("-");
				int start, end;
				try {
					start = Integer.parseInt(rangeAry[0]) - aryOffset;
					end = Integer.parseInt(rangeAry[1]);
					Arrays.fill(representedNums, start, end, 1);
				} catch(Exception e) {
					return false;
				}
			}
			
			if( sub.contains("/") ) {

				String[] rangeAry = sub.split("/");
				int start, by;
				try {
					
					start = Integer.parseInt(rangeAry[0]) - aryOffset;
					by = Integer.parseInt(rangeAry[1]);
					for( int i = start; i < representedNums.length; i += by ) {
						representedNums[i] = 1;
					}
				} catch(Exception e) {
					return false;
				}
			}
			
			try {
				int i = Integer.parseInt(sub) - aryOffset;
				representedNums[i] = 1;
			} catch (NumberFormatException e) {
				continue;
			} catch (ArrayIndexOutOfBoundsException e) {
				// Ignores mal-formatted cron expressions
				// Or ones where we specify a null value
				continue;
			}
		}
		
		return true;
	}
	
	public boolean isValid(int num) throws Exception{
		int tmp = 0;
		try {
			tmp = representedNums[num - aryOffset];
		} catch (ArrayIndexOutOfBoundsException e) {
			System.err.println("You tried to access " + num +" which isn't in range.");
		}
		return tmp != 0 ? true : false;
	}
	
	public int[] getArray() {
		return representedNums;
	}
}
