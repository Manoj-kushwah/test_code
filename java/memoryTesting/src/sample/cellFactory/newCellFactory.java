package sample.cellFactory;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.control.ListCell;
import javafx.scene.layout.Pane;

import java.io.IOException;
import java.io.UncheckedIOException;

public class newCellFactory extends ListCell<Object> {




    public newCellFactory() {
        try {
            FXMLLoader userFxmlLoader = new FXMLLoader(getClass().getResource("/sample/layout/listFxml.fxml"));
            userFxmlLoader.setController(this);

            try {
                userFxmlLoader.load();

            } catch (IOException e) {
                e.printStackTrace();
            }

        } catch (Exception exc) {

        }
    }

    @Override
    protected void updateItem(Object itemObj, boolean empty) {



    }

}
