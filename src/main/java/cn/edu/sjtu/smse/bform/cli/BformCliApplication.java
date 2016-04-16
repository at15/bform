package cn.edu.sjtu.smse.bform.cli;

import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.autoconfigure.SpringBootApplication;

/**
 * Created by at15 on 16-4-16.
 * <p>
 * see https://github.com/spring-projects/spring-boot/blob/master/spring-boot-samples/spring-boot-sample-simple/src/main/java/sample/simple/SampleSimpleApplication.java
 */
@SpringBootApplication
public class BformCliApplication implements CommandLineRunner {
    @Override
    public void run(String... strings) throws Exception {
        System.out.println("This is cli");
    }
}
