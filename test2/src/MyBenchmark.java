/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Minal
*/ 
public class MyBenchmark {
    private int type;
    
    public MyBenchmark() {
        type = 0;
    }
    
    public MyBenchmark(int t) {
        type = t;
    }
    
    public void timeMyOperation(int reps) {
        double[] before = EnergyCheckUtils.getEnergyStats();
        long 
            startTime = System.currentTimeMillis(),
            startMem = Runtime.getRuntime().totalMemory()-Runtime.getRuntime().freeMemory();
        switch (type) {
            case 1 : Factorial.iterative(50);
            case 2 : Factorial.iterativeObjects(20);
            default: Factorial.recursive(20);
        }
        long 
            endTime = System.currentTimeMillis(),
            endMem = Runtime.getRuntime().totalMemory()-Runtime.getRuntime().freeMemory();
        
        long
            runTime = endTime - startTime,
            memUsed = endMem - startMem;
        double[] after = EnergyCheckUtils.getEnergyStats();
        System.out.println(
                "Power consumption of dram: " + (after[0] - before[0]) / 10.0 + 
                " power consumption of cpu: " + (after[1] - before[1]) / 10.0 + 
                " power consumption of package: " + (after[2] - before[2]) / 10.0);
        
        System.out.println("RunTime: " + runTime);
        System.out.println("MemoryUsed: " + memUsed);
        
    }
}