/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.procoder.calipertest;

/**
 *
 * @author Minal
 */
public class Factorial {
	static long recursive(int number) {
		switch (number) {
			case 0:
				return number;

			default:
				return (number * recursive(number - 1));
		}
	}

	static long iterative(int number) {
		long result = 1;
		for (int i = number; i > 0; i--) {
			result *= i;
		}
		return result;
	}

	static long iterativeObjects(int number) {
		Long result = 1L;
		for (Integer i = number; i > 0; i--) {
			result *= i;
		}
		return result;
	}

}