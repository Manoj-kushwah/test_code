package sample;

import javafx.stage.Stage;

public class UIManager {

    private Stage primaryStage;
    private static UIManager _instance;

    public static UIManager getInstance() {
        return _instance;
    }

    public Stage getPrimaryStage() {
        return primaryStage;
    }

    public void setPrimaryStage(Stage primaryStage) {
        this.primaryStage = primaryStage;
    }

    UIManager(Stage primaryStage){
        setPrimaryStage(primaryStage);
    }
}
