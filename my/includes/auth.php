<?php
session_start();

function getDataFilePath(string $name): string
{
    return __DIR__ . '/../data/' . $name;
}

function readJsonFile(string $fileName, array $default = []): array
{
    $path = getDataFilePath($fileName);
    if (!file_exists($path)) {
        file_put_contents($path, json_encode($default, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return $default;
    }

    $data = json_decode((string) file_get_contents($path), true);
    return is_array($data) ? $data : $default;
}

function writeJsonFile(string $fileName, array $data): void
{
    $path = getDataFilePath($fileName);
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

function currentUser(): ?array
{
    return $_SESSION['user'] ?? null;
}

function isLoggedIn(): bool
{
    return isset($_SESSION['user']);
}

function requireLogin(): void
{
    if (!isLoggedIn()) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Please login to continue.'];
        header('Location: login.php');
        exit;
    }
}

function redirectIfLoggedIn(string $location): void
{
    if (isLoggedIn()) {
        header('Location: ' . $location);
        exit;
    }
}

function getFlash(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

function saveUser(array $user): void
{
    $users = readJsonFile('users.json');
    $users[] = $user;
    writeJsonFile('users.json', $users);
}

function findUserByEmail(string $email): ?array
{
    $users = readJsonFile('users.json');
    foreach ($users as $user) {
        if (strtolower((string) $user['email']) === strtolower($email)) {
            return $user;
        }
    }
    return null;
}

function savePayment(array $payment): void
{
    $payments = readJsonFile('payments.json');
    $payments[] = $payment;
    writeJsonFile('payments.json', $payments);
}

function getUserPayments(): array
{
    $email = currentUser()['email'] ?? '';
    $payments = readJsonFile('payments.json');

    if (!$email) {
        return [];
    }

    $userPayments = [];
    foreach ($payments as $payment) {
        if (($payment['email'] ?? '') === $email) {
            $userPayments[] = $payment;
        }
    }

    return array_reverse($userPayments);
}

function formatMoney(float $amount): string
{
    return '₦' . number_format($amount, 2);
}
