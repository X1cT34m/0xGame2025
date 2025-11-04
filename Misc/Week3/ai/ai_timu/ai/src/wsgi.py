#!/usr/bin/env python3
"""
WSGI entry point for the AI challenge application.
"""

import sys
import os

# Add the src directory to Python path
current_dir = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, current_dir)

# Also add the parent directory (app root) to Python path
parent_dir = os.path.dirname(current_dir)
sys.path.insert(0, parent_dir)

try:
    from server import app, logger
    
    if __name__ == "__main__":
        app.run(host='0.0.0.0', port=5555, debug=False)
        
except ImportError as e:
    print(f"Import error: {e}")
    print(f"Current working directory: {os.getcwd()}")
    print(f"Python path: {sys.path}")
    print(f"Files in src directory: {os.listdir(current_dir) if os.path.exists(current_dir) else 'Directory not found'}")
    print(f"Files in parent directory: {os.listdir(parent_dir) if os.path.exists(parent_dir) else 'Directory not found'}")
    raise