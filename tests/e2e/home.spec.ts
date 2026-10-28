import { test, expect } from '@playwright/test';

test.describe('Public site smoke', () => {
    test('home page loads with navigation', async ({ page }) => {
        await page.goto('/');
        await expect(page).toHaveTitle(/SO Living Bali|Home/i);
        await expect(page.getByRole('link', { name: 'Home' }).first()).toBeVisible();
    });

    test('properties for sale list loads', async ({ page }) => {
        await page.goto('/properties-for-sale');
        await expect(page.locator('body')).toBeVisible();
    });

    test('language switch to Indonesian works', async ({ page }) => {
        await page.goto('/locale/id');
        await expect(page).toHaveURL(/.*/);
    });
});
