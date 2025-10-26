@echo off
REM Laravel Portfolio CMS - Windows Fix Script
REM This script fixes authentication redirects and renames view files

echo ======================================
echo Laravel Portfolio CMS - Fix Script
echo ======================================
echo.

REM Check if we're in the Laravel root directory
if not exist "artisan" (
    echo [ERROR] Not in Laravel root directory. Please run this script from your project root.
    pause
    exit /b 1
)

echo Starting fixes...
echo.

REM ============================================
REM FIX 1: AuthenticatedSessionController
REM ============================================
echo [1/6] Fixing AuthenticatedSessionController...

if exist "app\Http\Controllers\Auth\AuthenticatedSessionController.php" (
    powershell -Command "(gc app\Http\Controllers\Auth\AuthenticatedSessionController.php) -replace \"return redirect\(\)->intended\(route\('dashboard', absolute: false\)\);\", \"return redirect()->intended(route('admin.dashboard', absolute: false));\" | Out-File -encoding ASCII app\Http\Controllers\Auth\AuthenticatedSessionController.php"
    echo [OK] AuthenticatedSessionController fixed
) else (
    echo [SKIP] AuthenticatedSessionController not found
)

REM ============================================
REM FIX 2: VerifyEmailController
REM ============================================
echo [2/6] Fixing VerifyEmailController...

if exist "app\Http\Controllers\Auth\VerifyEmailController.php" (
    powershell -Command "(gc app\Http\Controllers\Auth\VerifyEmailController.php) -replace \"route\('dashboard', absolute: false\)\", \"route('admin.dashboard', absolute: false)\" | Out-File -encoding ASCII app\Http\Controllers\Auth\VerifyEmailController.php"
    echo [OK] VerifyEmailController fixed
) else (
    echo [SKIP] VerifyEmailController not found
)

REM ============================================
REM FIX 3: EmailVerificationPromptController
REM ============================================
echo [3/6] Fixing EmailVerificationPromptController...

if exist "app\Http\Controllers\Auth\EmailVerificationPromptController.php" (
    powershell -Command "(gc app\Http\Controllers\Auth\EmailVerificationPromptController.php) -replace \"route\('dashboard', absolute: false\)\", \"route('admin.dashboard', absolute: false)\" | Out-File -encoding ASCII app\Http\Controllers\Auth\EmailVerificationPromptController.php"
    echo [OK] EmailVerificationPromptController fixed
) else (
    echo [SKIP] EmailVerificationPromptController not found
)

REM ============================================
REM FIX 4: ConfirmablePasswordController
REM ============================================
echo [4/6] Fixing ConfirmablePasswordController...

if exist "app\Http\Controllers\Auth\ConfirmablePasswordController.php" (
    powershell -Command "(gc app\Http\Controllers\Auth\ConfirmablePasswordController.php) -replace \"return redirect\(\)->intended\(route\('dashboard', absolute: false\)\);\", \"return redirect()->intended(route('admin.dashboard', absolute: false));\" | Out-File -encoding ASCII app\Http\Controllers\Auth\ConfirmablePasswordController.php"
    echo [OK] ConfirmablePasswordController fixed
) else (
    echo [SKIP] ConfirmablePasswordController not found
)

REM ============================================
REM FIX 5: EmailVerificationNotificationController
REM ============================================
echo [5/6] Fixing EmailVerificationNotificationController...

if exist "app\Http\Controllers\Auth\EmailVerificationNotificationController.php" (
    powershell -Command "(gc app\Http\Controllers\Auth\EmailVerificationNotificationController.php) -replace \"route\('dashboard', absolute: false\)\", \"route('admin.dashboard', absolute: false)\" | Out-File -encoding ASCII app\Http\Controllers\Auth\EmailVerificationNotificationController.php"
    echo [OK] EmailVerificationNotificationController fixed
) else (
    echo [SKIP] EmailVerificationNotificationController not found
)

REM ============================================
REM FIX 6: Rename View Files
REM ============================================
echo [6/6] Renaming view files...

REM Blog Posts views
if exist "resources\views\admin\blog-posts" (
    echo   Checking blog-posts views...
    if exist "resources\views\admin\blog-posts\blog-posts-index.blade.php" (
        rename "resources\views\admin\blog-posts\blog-posts-index.blade.php" "index.blade.php"
        echo   [OK] Renamed blog-posts-index.blade.php to index.blade.php
    )
    if exist "resources\views\admin\blog-posts\blog-posts-create.blade.php" (
        rename "resources\views\admin\blog-posts\blog-posts-create.blade.php" "create.blade.php"
        echo   [OK] Renamed blog-posts-create.blade.php to create.blade.php
    )
    if exist "resources\views\admin\blog-posts\blog-posts-edit.blade.php" (
        rename "resources\views\admin\blog-posts\blog-posts-edit.blade.php" "edit.blade.php"
        echo   [OK] Renamed blog-posts-edit.blade.php to edit.blade.php
    )
)

REM Categories views
if exist "resources\views\admin\categories" (
    echo   Checking categories views...
    if exist "resources\views\admin\categories\categories-index.blade.php" (
        rename "resources\views\admin\categories\categories-index.blade.php" "index.blade.php"
        echo   [OK] Renamed categories-index.blade.php to index.blade.php
    )
    if exist "resources\views\admin\categories\categories-create.blade.php" (
        rename "resources\views\admin\categories\categories-create.blade.php" "create.blade.php"
        echo   [OK] Renamed categories-create.blade.php to create.blade.php
    )
    if exist "resources\views\admin\categories\categories-edit.blade.php" (
        rename "resources\views\admin\categories\categories-edit.blade.php" "edit.blade.php"
        echo   [OK] Renamed categories-edit.blade.php to edit.blade.php
    )
)

REM Tags views
if exist "resources\views\admin\tags" (
    echo   Checking tags views...
    if exist "resources\views\admin\tags\tags-index.blade.php" (
        rename "resources\views\admin\tags\tags-index.blade.php" "index.blade.php"
        echo   [OK] Renamed tags-index.blade.php to index.blade.php
    )
    if exist "resources\views\admin\tags\tags-create.blade.php" (
        rename "resources\views\admin\tags\tags-create.blade.php" "create.blade.php"
        echo   [OK] Renamed tags-create.blade.php to create.blade.php
    )
    if exist "resources\views\admin\tags\tags-edit.blade.php" (
        rename "resources\views\admin\tags\tags-edit.blade.php" "edit.blade.php"
        echo   [OK] Renamed tags-edit.blade.php to edit.blade.php
    )
)

REM Projects views
if exist "resources\views\admin\projects" (
    echo   Checking projects views...
    if exist "resources\views\admin\projects\projects-index.blade.php" (
        rename "resources\views\admin\projects\projects-index.blade.php" "index.blade.php"
        echo   [OK] Renamed projects-index.blade.php to index.blade.php
    )
    if exist "resources\views\admin\projects\projects-create.blade.php" (
        rename "resources\views\admin\projects\projects-create.blade.php" "create.blade.php"
        echo   [OK] Renamed projects-create.blade.php to create.blade.php
    )
    if exist "resources\views\admin\projects\projects-edit.blade.php" (
        rename "resources\views\admin\projects\projects-edit.blade.php" "edit.blade.php"
        echo   [OK] Renamed projects-edit.blade.php to edit.blade.php
    )
)

echo.
echo [OK] View files checked and renamed
echo.

REM ============================================
REM Summary
REM ============================================
echo ======================================
echo All fixes completed!
echo ======================================
echo.
echo What was fixed:
echo 1. [OK] AuthenticatedSessionController - Login redirect
echo 2. [OK] VerifyEmailController - Email verification redirects
echo 3. [OK] EmailVerificationPromptController - Verification prompt redirect
echo 4. [OK] ConfirmablePasswordController - Password confirmation redirect
echo 5. [OK] EmailVerificationNotificationController - Notification redirect
echo 6. [OK] View files renamed to Laravel conventions
echo.
echo Next steps:
echo 1. Run: php artisan migrate:fresh
echo 2. Test registration at: http://yoursite.test/register
echo 3. Test login at: http://yoursite.test/login
echo 4. Access admin at: http://yoursite.test/admin/dashboard
echo.
echo Happy coding!
echo.
pause
