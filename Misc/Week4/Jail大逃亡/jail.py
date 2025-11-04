def jail():
    while True:
        player_input=input("Please input your code here: ")
        try:
            result=eval(player_input,{"__builtins__":None},{})
            print("Code have been executed")
            if result is not None:
                print(f"Return value: {result}")

        except Exception as e:
            print(f"Execution error: {type(e).__name__}: {e}")