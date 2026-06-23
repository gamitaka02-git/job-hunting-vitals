@echo off
title Job Hunting Vitals

echo ========================================
echo   Starting Job Hunting Vitals...
echo ========================================
echo.

REM Check if bundled PHP is present
if not exist "%~dp0jobhuntingvitals\php\php.exe" (
    echo [ERROR] Bundled PHP is not found in jobhuntingvitals\php.
    echo Please make sure php.exe exists in that directory.
    pause
    exit /b 1
)

REM Set port
set PORT=8080

REM Change directory to the tool root
cd /d "%~dp0jobhuntingvitals"

echo Starting server on port %PORT%...
echo.
echo Please open the following URL in your browser:
echo   http://localhost:%PORT%
echo.
echo To stop the server, close this window.
echo ========================================

REM Automatically open the browser
start "" "http://localhost:%PORT%"

REM Start PHP built-in server using bundled PHP
"%~dp0jobhuntingvitals\php\php.exe" -c "%~dp0jobhuntingvitals\php\php.ini" -S localhost:%PORT%

pause

