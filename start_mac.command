#!/bin/bash

echo "========================================"
echo "  Starting Job Hunting Vitals..."
echo "========================================"
echo ""

# Set port
PORT=8080

# Change directory to the tool root
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$SCRIPT_DIR/jobhuntingvitals"

# Define bundled PHP path
BUNDLED_PHP="./php-mac/php"

# Check if bundled PHP exists
if [ -f "$BUNDLED_PHP" ]; then
    # Give execution permission to bundled PHP just in case
    chmod +x "$BUNDLED_PHP"
    PHP_CMD="$BUNDLED_PHP"
else
    # Fallback to system PHP
    if command -v php &> /dev/null; then
        PHP_CMD="php"
    else
        echo "[ERROR] PHP is not found."
        echo "Please make sure Mac PHP binary exists in jobhuntingvitals/php-mac/php"
        echo "Or install PHP via Homebrew: brew install php"
        echo ""
        read -p "Press Enter to exit..."
        exit 1
    fi
fi

echo "Starting server on port $PORT..."
echo ""
echo "Please open the following URL in your browser:"
echo "  http://localhost:$PORT"
echo ""
echo "To stop the server, press Ctrl+C."
echo "========================================"

# Automatically open the browser after a short delay to ensure the server is ready
(
    sleep 2
    open "http://localhost:$PORT" || echo "Failed to open browser automatically. Please access http://localhost:$PORT manually."
) &

# Start PHP built-in server using the selected PHP command
$PHP_CMD -S localhost:$PORT

