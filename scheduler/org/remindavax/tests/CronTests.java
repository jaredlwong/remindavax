package org.remindavax.tests;

import static org.junit.Assert.*;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.remindavax.CronSubExpression;

public class CronTests {

	@Before
	public void setUp() throws Exception {
		
	}

	@After
	public void tearDown() throws Exception {
	}
	
	@Test 
	public void yearTest() {
		try {
			CronSubExpression all = new CronSubExpression("*","year");
			assertFalse(all.isValid(-1));
			assertFalse(all.isValid(0));
			assertFalse(all.isValid(1969));
			assertFalse(all.isValid(2100));
			assertTrue(all.isValid(1970));
			assertTrue(all.isValid(2099));
			
			CronSubExpression every = new CronSubExpression("1970/10","year");
			assertTrue(every.isValid(2000));
			assertFalse(every.isValid(2012));
		}
		catch (Exception e) {
			System.err.println(e.getMessage());
		}
	}
	
	@Test 
	public void dowTest() {
		try {
			CronSubExpression all = new CronSubExpression("*","dow");
			assertFalse(all.isValid(-1));
			assertFalse(all.isValid(0));
			assertFalse(all.isValid(8));
			assertTrue(all.isValid(1));
			assertTrue(all.isValid(7));
			assertArrayEquals(new int[]{1,1,1,1,1,1,1},all.getArray());
			
			CronSubExpression range = new CronSubExpression("1-4","dow");
			assertArrayEquals(new int[]{1,1,1,1,0,0,0},range.getArray());
			
			CronSubExpression combined = new CronSubExpression("1,4-5,3/3","dow");
			assertArrayEquals(new int[]{1,0,1,1,1,1,0},combined.getArray());
		}
		catch (Exception e) {
			System.err.println(e.getMessage());
		}
	}
	
	@Test
	public void monTest() {
		try {
			CronSubExpression all = new CronSubExpression("*","mon");
			assertFalse(all.isValid(-1));
			assertFalse(all.isValid(0));
			assertFalse(all.isValid(13));
			assertTrue(all.isValid(1));
			assertTrue(all.isValid(12));
			assertArrayEquals(new int[]{1,1,1,1,1,1,1,1,1,1,1,1},all.getArray());
			
			CronSubExpression range = new CronSubExpression("1-4","mon");
			assertArrayEquals(new int[]{1,1,1,1,0,0,0,0,0,0,0,0},range.getArray());
			
			CronSubExpression combined = new CronSubExpression("1,2,4-5,3/3","mon");
			assertArrayEquals(new int[]{1,1,1,1,1,1,0,0,1,0,0,1},combined.getArray());

		}
		catch (Exception e) {
			System.err.println(e.getMessage());
		}
	}

	@Test
	public void domTest() {
		try {
			CronSubExpression all = new CronSubExpression("*","dom");
			assertFalse(all.isValid(-1));
			assertFalse(all.isValid(0));
			assertFalse(all.isValid(32));
			assertTrue(all.isValid(1));
			assertTrue(all.isValid(31));
			assertArrayEquals(new int[]{1,1,1,1,1,1,1,1,1,1,
										1,1,1,1,1,1,1,1,1,1,
										1,1,1,1,1,1,1,1,1,1,1},
										all.getArray());
			
			CronSubExpression nospecs = new CronSubExpression("?","dom");
			assertArrayEquals(new int[]{1,1,1,1,1,1,1,1,1,1,
										1,1,1,1,1,1,1,1,1,1,
										1,1,1,1,1,1,1,1,1,1,1},
										nospecs.getArray());
			
			CronSubExpression range = new CronSubExpression("1-5","dom");
			assertArrayEquals(new int[]{1,1,1,1,1,0,0,0,0,0,
										0,0,0,0,0,0,0,0,0,0,
										0,0,0,0,0,0,0,0,0,0,0},
										range.getArray());
			
			CronSubExpression explicit = new CronSubExpression("1,4,6,20","dom");
			assertArrayEquals(new int[]{1,0,0,1,0,1,0,0,0,0,
										0,0,0,0,0,0,0,0,0,1,
										0,0,0,0,0,0,0,0,0,0,0},
										explicit.getArray());
			
			CronSubExpression every = new CronSubExpression("1/3","dom");
			assertArrayEquals(new int[]{1,0,0,1,0,0,1,0,0,1,
										0,0,1,0,0,1,0,0,1,0,
										0,1,0,0,1,0,0,1,0,0,1},
										every.getArray());
			
			CronSubExpression altevery = new CronSubExpression("4/4","dom");
			assertArrayEquals(new int[]{0,0,0,1,0,0,0,1,0,0,
										0,1,0,0,0,1,0,0,0,1,
										0,0,0,1,0,0,0,1,0,0,0},
										altevery.getArray());
			
			
			CronSubExpression combine1 = new CronSubExpression("1,2,5-6","dom");
			assertArrayEquals(new int[]{1,1,0,0,1,1,0,0,0,0,
										0,0,0,0,0,0,0,0,0,0,
										0,0,0,0,0,0,0,0,0,0,0},
										combine1.getArray());
			
			CronSubExpression combine2 = new CronSubExpression("1-4,5/3","dom");
			assertArrayEquals(new int[]{1,1,1,1,1,0,0,1,0,0,
										1,0,0,1,0,0,1,0,0,1,
										0,0,1,0,0,1,0,0,1,0,0},
										combine2.getArray());
			
			CronSubExpression overlap1 = new CronSubExpression("1-6,3-8","dom");
			assertArrayEquals(new int[]{1,1,1,1,1,1,1,1,0,0,
										0,0,0,0,0,0,0,0,0,0,
										0,0,0,0,0,0,0,0,0,0,0},
										overlap1.getArray());
			
			CronSubExpression overlap2 = new CronSubExpression("1-6,3/8","dom");
			assertArrayEquals(new int[]{1,1,1,1,1,1,0,0,0,0,
										1,0,0,0,0,0,0,0,1,0,
										0,0,0,0,0,0,1,0,0,0,0},
										overlap2.getArray());
			
		} catch (Exception e) {
			System.err.println(e.getMessage());
		}
	}

}
