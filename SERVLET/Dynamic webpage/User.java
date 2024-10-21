package com.example;

import java.util.ArrayList;
import java.util.List;

public class User {

  private String userId;
  private List<String> cart;

  public User(String userId) {
    this.userId = userId;
    this.cart = new ArrayList<>();
  }

  public String getUserId() {
    return userId;
  }

  public List<String> getCart() {
    return cart;
  }

  public void addItemToCart(String item) {
    cart.add(item);
  }

  public void clearCart() {
    cart.clear();
  }
}
